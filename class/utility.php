<?php
/**
 * @author freaksmj
 */
include_once('../config/class.database.php');

class Utility{


	function backup($nama_file,$tables = ''){
		global $return, $tables, $back_dir, $database ;
		
		if($tables == ''){
			$tables = array();
			$result = @mysql_list_tables($database);
			while($row = @mysql_fetch_row($result)){
				$tables[] = $row[0];
			}
		} else {
			$tables = is_array($tables) ? $tables : explode(',',$tables);
		}
		
		$return	= '';
		
		foreach($tables as $table) {
			$result	 = @mysql_query('SELECT * FROM '.$table);
			$num_fields = @mysql_num_fields($result);
			
			//menyisipkan query drop table untuk nanti hapus table yang lama
			$return	.= "DROP TABLE IF EXISTS ".$table.";";
			$row2	 = @mysql_fetch_row(mysql_query('SHOW CREATE TABLE  '.$table));
			$return	.= "\n\n".$row2[1].";\n\n";
			
			for ($i = 0; $i < $num_fields; $i++) {
				while($row = @mysql_fetch_row($result)){
					$return.= 'INSERT INTO '.$table.' VALUES(';

					for($j=0; $j<$num_fields; $j++) {
						$row[$j] = @addslashes($row[$j]);
						$row[$j] = @ereg_replace("\n","\\n",$row[$j]);
						if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
						if ($j<($num_fields-1)) { $return.= ','; }
					}
					$return.= ");\n";
				}
			}
			$return.="\n\n\n";
		}
		
		$nama_file;
		
		$handle = fopen($back_dir.$nama_file,'w+');
		fwrite($handle, $return);
		fclose($handle);
	}
	
	function restore($file) {
		global $rest_dir;
		
		$nama_file	= $file['name'];
		$ukrn_file	= $file['size'];
		$tmp_file	= $file['tmp_name'];
		
		if ($nama_file == ""){
			echo "Fatal Error";
		} else {
			$alamatfile	= $rest_dir.$nama_file;
			$templine	= array();
			
			if (move_uploaded_file($tmp_file , $alamatfile)){
				
				$templine	= '';
				$lines		= file($alamatfile);

				foreach ($lines as $line){
					if (substr($line, 0, 2) == '--' || $line == '')
						continue;
				 
					$templine .= $line;

					if (substr(trim($line), -1, 1) == ';'){
						mysql_query($templine) or print('Query gagal \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');

						$templine = '';
					}
				}
				unlink($alamatfile);
				//echo "<center>Berhasil Restore Database, silahkan di cek.</center>";
			
			} else {
				echo "Proses upload gagal, kode error = " . $file['error'];
			}	
		}
		
	}
}
?>