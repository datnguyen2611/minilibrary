function confirmSubmit() {
    if (confirm("Are you sure you want to submit the form?")) {
        document.getElementById("deleteForm").submit();
    }
    return false;
}
