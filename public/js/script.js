function showModal(id) {
    document.getElementById("uploadModalBack").style.display = "block";
    document.getElementById("commonModal").style.display = "block";
    document.getElementById(id).style.display = "block";
}

function hideModal() {
    document.getElementById("uploadModalBack").style.display = "none";
    document.getElementById("commonModal").style.display = "none";
}