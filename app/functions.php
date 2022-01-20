<?php 

// "sql301.epizy.com", "epiz_29868571", "2Y0f97VRA5qNok", "epiz_29868571_guild_rain"
$conn = mysqli_connect("localhost", "root", "", "guild_rain"); 

function format_interval(DateInterval $interval) {
	$result = "";
	if ($interval->y !==0) {
        if ($interval->y) 
        $result .= $interval->format("%y years "); 
        $result .= $interval->format("%m months "); 
    } elseif ($interval->m !==0) { 
        $result .= $interval->format("%m months "); 
        $result .= $interval->format("%d days ");
    } elseif ($interval->d !==0) { 
        $result .= $interval->format("%d days ");
        $result .= $interval->format("%h hours "); 
    } elseif ($interval->h !==0) { 
        $result .= $interval->format("%h hours "); 
        $result .= $interval->format("%i minutes "); 
    } elseif ($interval->i !==0) { 
        $result .= $interval->format("%i minutes "); 
        $result .= $interval->format("%s seconds "); 
    } else { 
        $result .= $interval->format("%s seconds "); 
    }

    $arr = explode(" ", $result);
    if ($arr[0] == 1) {
        $arr[1] = substr_replace($arr[1], "", -1);
    }
    if ($arr[2] == 1) {
        $arr[3] = substr_replace($arr[3], "", -1);
    }
    if ($arr[2] == 0) {
        array_splice($arr, 2);
    }
    $result = implode(" ", $arr);

	return $result;
}

function differenceDate($postDate) {	
	date_default_timezone_set('Asia/Jakarta');
	$x = date("Y-m-d G:i:s");
	$thisDate = new DateTime("$x");
	$pasttDate = new DateTime("$postDate");

	$difference = $thisDate->diff($pasttDate);

	$result = format_interval($difference);

	return $result;
}

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

// function editProfile($data){
// 	global $conn;

// 	$ign = htmlspecialchars($data['ign']);
// 	$job = htmlspecialchars($data['job']);
// 	$name = htmlspecialchars($data['name']);
// 	$gender = htmlspecialchars($data['gender']);
// 	$age = htmlspecialchars($data['age']);
// 	$address = htmlspecialchars($data['address']);
// 	$position = 'Rookie';
	
// 	//upload img
 
// 	$img = upload();
// 	if( !$img ) {
// 		return false;
// 	}

// 	$query = "INSERT INTO bio_members (ign, job, name, gender, age, address, position, img) 
// 				VALUES ('$ign', '$job', '$name', '$gender', '$age', '$address', '$position', '$img')
// 			";
// 	mysqli_query($conn, $query);

// 	return (mysqli_affected_rows($conn));

// }

function upload($arr, $img){
	$namaFile = $arr['name'];
	$ukuranFile = $arr['size'];
	$tmpName = $arr['tmp_name'];

	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
			echo "<script>
					alert('File must be jpg/jpeg/png');
				</script>";
		return false;
	}

	if( $ukuranFile > 1000000 ) {
		echo "<script>
			alert('Image size too big');
		</script>";
		return false;
	}

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;  

	// function moveUp() {
	// 	global $tmpName;
	// 	global $namaFileBaru;
	// 	move_uploaded_file($tmpName, '../ss/' . $namaFileBaru);
	// }

	switch ($img) {
		case 'profile':
			move_uploaded_file($tmpName, '../../public/uploads/profile/' . $namaFileBaru);
			break;

		case 'char':
			move_uploaded_file($tmpName, '../../public/uploads/ss/' . $namaFileBaru);
			break;
	}

	return $namaFileBaru;
}


function validJob($job){

	if( $job == ""){
		return false;
	} else {
		return true;
	}
}
 
function deleteBio($id) {
	global $conn;

	$namaFile = mysqli_query($conn, "SELECT img FROM bio_members WHERE id_member = '$id' ");
	$row = mysqli_fetch_assoc($namaFile);

	if ($row["img"] == !null) {
		$file = $row["img"];
	}

	mysqli_query($conn, "DELETE FROM bio_members WHERE id_member = $id");

	return mysqli_affected_rows($conn);

	if ($row["img"] == !null) {
		unlink('../public/uploads/ss/' . $file);
	}

	
}

function deleteUser($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM users WHERE id_user = $id");
	return mysqli_affected_rows($conn);
}

function registrasi($data) {
	global $conn;

	$username = strtolower( stripslashes($data["username"]) );
	$ign = htmlspecialchars($data['ign']);
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$conpw = mysqli_real_escape_string($conn, $data["conpw"]);

	$result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username' ");
	$result2 = mysqli_query($conn, "SELECT username FROM confirm_users WHERE username = '$username' ");
	
	if( mysqli_fetch_assoc($result) || mysqli_fetch_assoc($result2) ) {
		echo "<script>
			alert('Username Is Already Exist');
		</script>";
		return false;
	}

	if ( $password !== $conpw ) {
		echo "<script>
			alert('Confirm Password Does Not Match');
		</script>";
		return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);

	mysqli_query($conn, "INSERT INTO confirm_users VALUES('', '$username', '$ign', '$password')");

	return mysqli_affected_rows($conn);


}


function editProfile($data) {
	global $conn;

	$id = $data["id"];
	$ign = htmlspecialchars($data['ign']);
	$job = htmlspecialchars($data['job']);
	$name = htmlspecialchars($data['name']);
	$gender = htmlspecialchars($data['gender']);
	$age = htmlspecialchars($data['age']);
	$address = htmlspecialchars($data['address']);
	$position = htmlspecialchars($data['position']);
	$oldImgProfile = $data['oldImgProfile'];
	$oldImgChar = $data['oldImgChar'];

	if($_FILES['imgProfile']['error'] === 0 && $_FILES['imgChar']['error'] === 0) {
		if ($oldImgProfile == !'') {
			unlink('../../public/uploads/profile/'.$oldImgProfile);
		}
		$imgProfile = upload($_FILES['imgProfile'], 'profile');
		if ($oldImgChar == !'') {
			unlink('../../public/uploads/ss/'.$oldImgChar);
		}
		$imgChar = upload($_FILES['imgChar'], 'char');
	} elseif ($_FILES['imgProfile']['error'] === 0 && $_FILES['imgChar']['error'] === 4) {
		if ($oldImgProfile == !'') {
			unlink('../../public/uploads/profile/'.$oldImgProfile);
		}
		$imgProfile = upload($_FILES['imgProfile'], 'profile');
		$imgChar = $oldImgChar;
	} elseif ($_FILES['imgProfile']['error'] === 4 && $_FILES['imgChar']['error'] === 0) {
		if ($oldImgChar == !'') {
			unlink('../../public/uploads/ss/'.$oldImgChar);
		}
		$imgChar = upload($_FILES['imgChar'], 'char');
		$imgProfile = $oldImgProfile;
	} else {
		$imgProfile = $oldImgProfile;
		$imgChar = $oldImgChar;	
	}

	$query = "UPDATE bio_members SET
				ign = '$ign',
				job = '$job',
				name = '$name',
				gender = '$gender',
				age = '$age',
				address = '$address',
				position = '$position',
				img_char = '$imgChar',
				img_profile = '$imgProfile'
			WHERE id_member = $id
			";
	mysqli_query($conn, $query);

	return (mysqli_affected_rows($conn));

}

function confirm_member($data) {
	global $conn;

	$username = $data["username"];
	$ign = $data['ign'];
	$password = $data["password"];

	// insert into table bio_members
	mysqli_query($conn, "INSERT INTO bio_members (id_member, ign, job, name, gender, age, address, position, img_char, img_profile) VALUES (NULL, '$ign', '', '', '', '', '', '', '', '')");

	$result = mysqli_query($conn, "SELECT * FROM bio_members WHERE id_member IN (SELECT MAX(id_member) FROM bio_members)");
	$field_member = mysqli_fetch_assoc($result);
	$id_member = $field_member['id_member'];

	// insert into users with id_member
	mysqli_query($conn, "INSERT INTO users (id_user, id_member, username, password) VALUES('', '$id_member', '$username', '$password')");

	return (mysqli_affected_rows($conn));
}

function post($data, $id_user) {
	global $conn;
	$caption = htmlspecialchars($data["caption"]);
	date_default_timezone_set('Asia/Jakarta');
	$date = date("Y-m-d G:i:s");
	$tags = [];

	for ($i=1; $i > 0; $i++) { 
		if (isset($data["tag$i"])) {
			$tags[$i] = htmlspecialchars($data["tag$i"]);
		} else {
			$i = -1;
		}
	} $hashtag = implode(",", $tags);

	mysqli_query($conn, "INSERT INTO posts (id_user, caption, hashtag, datetime, img) VALUES ('$id_user', '$caption', '$hashtag', '$date', '')");

	return (mysqli_affected_rows($conn));
}

function deletePost($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM posts WHERE id_post = $id");
	mysqli_query($conn, "DELETE FROM likes WHERE id_post = $id");
	return mysqli_affected_rows($conn);
}


function myAlert($teks, $tombol, $ign) { ?>

	<!-- The Modal -->
	<div id="myModal" class="modal" style="display: block;">

	  <!-- Modal content -->
	  <div class="modal-content">
	    <img src="public/imgs/sticker1.png" class="sticker" >
	    <p> <?= $teks; ?> <b><?= $ign; ?></b> </p><br>
	    <p><span class="close"> <?= $tombol; ?> </span></p>
	  </div>

	</div>

<?php }

// lanjut disini


?>

