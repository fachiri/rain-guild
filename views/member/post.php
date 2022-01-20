<?php 

$id_user = $_SESSION['id_user'];
if (isset($_POST["post"])) {
	if (post($_POST, $id_user) > 0) {
		echo "<script>
			alert('Posted');
			document.location.href = 'gallery_page';
		</script>";
	} else {
		echo "<script>
			alert('Failed to post');
		</script>";
	}
}

?>

<div class="header">
	<p>Post</p>
</div>
<br>
<form action="" method="post">
	<div class="formPost">
		<label class="label">Caption</label>
		<textarea class="inputStyle" name="caption" id="" cols="30" rows="10" placeholder="Type your caption"></textarea>
	</div>
	<div class="formPost">
		<label class="label">Hashtag</label>
		<input type="text" class="inputStyle" id="hashtags" autocomplete="off" placeholder="Type your hashtag & click enter.">
		<div class="tag-container"></div>
	</div>
	<div class="allButton">	
		<div class="submit">
			<button class="submitButton" type="submit" name="post">Post</button>
		</div>
		<div class="back">
			<button class="submitButton" type="button" onclick="window.location.href= 'gallery_page'">Back</button>
		</div>			
	</div>
</form>

<script>

	let input, hashtagArray, container, t, x;
	x = 1;
	input = document.querySelector('#hashtags');
	container = document.querySelector('.tag-container');
	hashtagArray = [];

	input.addEventListener('keyup', () => {
		if (event.which == 13 && input.value.length > 0) {
		var text = document.createTextNode(input.value);
		var text2 = input.value;
		var p = document.createElement('p');
		var inpt = document.createElement('input');
		container.appendChild(p);
		p.appendChild(inpt);
		p.appendChild(text);
		p.classList.add('tag');
		inpt.setAttribute('name', 'tag'+x+'');
		inpt.setAttribute('type', 'hidden');
		inpt.value =  ''+text2+'';
		input.value = '';
		x += 1;
		
		// delete tag
		let deleteTags = document.querySelectorAll('.tag');	
		for(let i = 0; i < deleteTags.length; i++) {
			deleteTags[i].addEventListener('click', () => {
			container.removeChild(deleteTags[i]);
			// sorti tag
			let sortTags = document.querySelectorAll('.tag input');
			for(let i = 0; i < sortTags.length; i++) {
				sortTags[i].setAttribute('name', 'tag'+(i+1)+'');
			}


			});
		}

		

		}		
	});
	
	// disable enter on the page
	$(document).keypress(
	function(event){
		if (event.which == '13') {
		event.preventDefault();
		}
	});

	// disable space on the hashtag line
	$(input).keypress(
	function(event){
		if (event.which == '32') {
		event.preventDefault();
		}
	});

</script>