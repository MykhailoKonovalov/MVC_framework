function showForm()
{
    let deleteForm = document.getElementById("delete_form");
    if (deleteForm.style.display === "none") {
        deleteForm.style.display = "block";
    } else {
        deleteForm.style.display = "none";
    }
}