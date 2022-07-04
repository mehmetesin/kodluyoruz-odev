$(document).ready(() => {
    

    $('.addCart').click(function () {
        let id = ($(this).attr('book-id'));
        $.post("./cart-process.php",
            {
                id: id,
                process: "add"
            },
            function (data, status) {
                let res = JSON.parse(data)
                // alert(a.summary.count);
                $('.cartCount').text(res.summary.count)
            });
        

    })
})