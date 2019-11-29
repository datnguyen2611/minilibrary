$(document).ready(function () {
    $(".checkbox-books").click(function (event) {
        const searchIDs = $(".checkbox-books:checked").map(function () {
            return {
                id: $(this).val(),
                name: $(this).data('name')
            };
        }).get(); // <----


        let html = '';
        searchIDs.forEach((element, key) => {
            html += `
               <label>${element.name}</label>
               <input type="text" name="books[${key}][book_id]" value="${element.id}" hidden> 
               <input type="text" name="books[${key}][quantity]" placeholder="Quantity">
               <br/>
            `;
        });
        document.getElementById('wrapped').innerHTML = html;

    });
});
