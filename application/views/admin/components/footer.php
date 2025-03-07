</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.min.js"></script>
<script>
	// var quillTitle = new Quill('#title-container', {
	// 	theme: 'snow'
	// });
	// var quillDesc = new Quill('#desc-container', {
	// 	theme: 'snow'
	// });
	var quillContent = new Quill('#editor-container', {
		theme: 'snow'
	});

	document.querySelector('form').onsubmit = function() {
		// document.querySelector('#title').value = quillTitle.root.innerHTML;
		// document.querySelector('#description').value = quillDesc.root.innerHTML;
		document.querySelector('#content').value = quillContent.root.innerHTML;
	};

	function validateImage() {
		var image = document.getElementById("image").files[0];
		if (image && image.size > 5242880) { // 5MB in bytes
			alert("Image size should not be greater than 5MB.");
			return false;
		}
		return true;
	}
</script>
<script>
	document.getElementById("sidebarToggle").addEventListener("click", function () {
            document.getElementById("sidebar").classList.toggle("show");
            document.getElementById("mainContent").classList.toggle("shift");
        });
</script>
</body>

</html>
