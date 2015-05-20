<?php
	include 'include/class.database.php';
	class User extends Database {
		public function register($name, $email, $password) {
			$password = md5($password);
			$selectUsers = "SELECT * 
							FROM users
							WHERE email='$email'
							";
			# Check if user already register
			$checkUser = $this->db->query($selectUsers);
			$count_row = $checkUser->num_rows;
			# if user not register then register them
			if($count_row == 0) {
				$addUser = "INSERT INTO users
							SET name='$name', email='$email', password='$password'
							";
				$result = mysqli_query($this->db, $addUser) or die (mysqli_connect_errno(). "ERROR: User not register.");
				return $result;
			}
			else {
				return false;
			}
		}
		public function login($email, $password) {
			$password = md5($password);

			$query = "SELECT email, password, userID
						FROM users
						WHERE email=? AND password=?
						";

			$stmt = $this->db->prepare($query);
			$stmt->bind_param('sss', $email, $password, $userID);
			$stmt -> execute();
			
			$stmt->bind_result($email, $password, $userID);

			$stmt -> fetch();
			echo $name;
      		$_SESSION['login'] = true;
			$_SESSION['userID'] = $userID; 
			return true;

			$stmt->close();
			#$stmt->free_result();
		}

		// public function login($email, $password) {
		// 	$password = md5($password);
		// 	$checkUserInputs = "SELECT userID
		// 						FROM users
		// 						WHERE email='$email' and password='$password'
		// 						";

		// 	#Check if user details present in DB
		// 	$result = mysqli_query($this->db, $checkUserInputs);
		// 	$user_data = mysqli_fetch_assoc($result);
			
		// 	$count_row = $result->num_rows;
		// 	if($count_row == 1) {
		// 		$_SESSION['login'] = true;
		// 		$_SESSION['userID'] = $user_data['userID']; 
		// 		return true;
		// 	}
		// 	else {
		// 		return false;
		// 	}
		// }

		public function get_fullname($userID) {
			$displayFullName = "SELECT name
								FROM users
								WHERE userID='$userID'
								";
			$result = mysqli_query($this->db, $displayFullName)	;
			$user_data = mysqli_fetch_assoc($result);
			print $user_data['name'];
		}


		public function get_user_details($userID) {
			$displayUserDeatils = "SELECT * 
									FROM users
									WHERE userID='$userID'
									";
			$result = mysqli_query($this->db, $displayUserDeatils);
			$user_data = mysqli_fetch_assoc($result);
			echo $user_data['name'], $user_data['email'], $user_data['reg_date'];
		}
		public function get_session() {
			return $_SESSION['login'];
		}
		public function user_logout() {
			$_SESSION['login'] = FALSE;
			session_destroy();
		}
	}
?>