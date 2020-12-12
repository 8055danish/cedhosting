<?php
require "dbcon.php";
class Query extends Database {

	function getData($table, $fields = '', $conditions = '') {
		$sql = "SELECT * FROM `$table`";

		if ($fields != '') {
			$fields = "`" . implode('`,`', $fields) . "`";
			$sql = "SELECT $fields from `$table`";
		}
		if ($conditions != '') {
			$sql .= " WHERE ";
			$i = 0;
			foreach ($conditions as $key => $value) {
				if ($i % 2 == 0) {
					$sql .= " `$key`='$value' ";
				}

				if ($i % 2 != 0) {
					$sql .= " $value ";
				}
				$i++;

			}
		}

		$result = $this->connect()->query($sql);
		$data = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		} else {
			return 0;
		}

	}
	function insertData($table, $arr = '') {
		if ($arr != '') {
			$fields = array();
			$values = array();

			foreach ($arr as $key => $value) {
				$fields[] = $key;
				$values[] = $value;
			}
			$fields = "`" . implode('`,`', $fields) . "`";
			$values = "'" . implode("','", $values) . "'";
			$sql = "INSERT INTO `$table`($fields) VALUES($values)";

			$conn = $this->connect();
			if ($conn->query($sql) == TRUE) {
				return $conn->insert_id;

			} else {
				return 0;
			}
		}

	}
	function updateData($table, $fields = '', $conditions = '') {
		if ($fields != '') {
			$j = 1;
			$count = count($fields);
			$sql = "UPDATE `$table` SET ";
			foreach ($fields as $key => $value) {
				if ($j == $count) {
					$sql .= " `$key`='$value' ";
				} else {
					$sql .= " `$key`='$value', ";
				}
				$j++;
			}
			if ($conditions != '') {
				$sql .= " WHERE ";
				$i = 0;
				foreach ($conditions as $key => $value) {
					if ($i % 2 == 0) {
						$sql .= " `$key`='$value' ";
					}

					if ($i % 2 != 0) {
						$sql .= " $value ";
					}
					$i++;

				}
				return $this->connect()->query($sql);
			}
		}
	}
	function deleteData($table, $conditions = '') {
		$sql = "DELETE FROM `$table`";

		if ($conditions != '') {
			$sql .= " WHERE ";
			$i = 0;
			foreach ($conditions as $key => $value) {
				if ($i % 2 == 0) {
					$sql .= " `$key`='$value' ";
				}

				if ($i % 2 != 0) {
					$sql .= " $value ";
				}
				$i++;

			}

		}
		return $this->connect()->query($sql);
	}

	function emailVerification($email, $name, $id) {
		$mail = new PHPMailer();
		$mail->isSMTP();
		//$mail->SMTPDebug = 2;                                   // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
		$mail->SMTPAuth = true; // Enable SMTP authentication
		$mail->Username = 'forzupee06@gmail.com'; // SMTP username
		$mail->Password = 'zupee@06'; // SMTP password
		$mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587; // TCP port to connect to

		$mail->setFrom('forzupee06@gmail.com', 'info');
		$mail->addAddress($email, $name); // Add a recipient

		//$mail->addAddress('ellen@example.com');               // Name is optional
		//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');

		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$url = 'http://192.168.2.135/cedhosting/Verify/verify.php?id=' . $id; // Set email format to HTML

		$output = '<div>Thanks for registering.Please click this link to complete this registation <br>' . $url . '</div>';

		$mail->isHTML(true);

		$mail->Subject = 'Registeration confirmation';
		$mail->Body = $output;
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if (!$mail->send()) {
			return "Message could not be sent.";
			//echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			return "Congratulation,Please verify your account link send to your gmail account.";

		}
	}
	function selectJoin($table1, $table2, $fields, $conditions) {
		$sql = 'SELECT ';
		if ($fields != '') {
			$j = 1;
			$count0 = count($fields);
			$count1 = count($conditions);
			foreach ($fields as $key => $value) {
				if ($j == $count0) {

					$sql .= "`$key`.$value";
				} else {
					$sql .= "`$key`.$value,";
				}
				$j++;
			}
			$k = 1;
			$sql .= " FROM ";

			$sql .= $table1 . " JOIN " . $table2 . " ON ";

			foreach ($conditions as $key => $value) {
				if ($k == $count1) {
					$sql .= "=`$key`.$value";
				} else {
					$sql .= "`$key`.$value";
				}
				$k++;
			}
		}
		//return $this->connect()->query($sql);
		$result = $this->connect()->query($sql);
		$data = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		} else {
			return 0;
		}
	}
}
?>