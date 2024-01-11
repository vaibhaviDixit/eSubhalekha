<script>


// Show loader when the page starts reloading
document.addEventListener("beforeunload", function() {
	console.log("unload");
    document.getElementById("loader-div").style.display = "block";
});

// You may also want to hide the loader when the page has finished reloading
document.addEventListener("load", function() {
    document.getElementById("loader-div").style.display = "none";
});

    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>