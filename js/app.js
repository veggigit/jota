const form = document.getElementById('formqty');
form.addEventListener('submit', function (e) {
    e.preventDefault();

    var oldArry = document.querySelectorAll('.row_element');
    var newArry = [];

    oldArry.forEach(ele => {
        var id = ele.querySelector('.row-id').innerHTML;
        var qty = ele.querySelector('.row-newqty').value;
        var row = { id: id, qty: qty }
        newArry.push(row);
    });

    axios.post('/controllers/save_qty.php', {
        data:newArry
    })
    .then(function(response) {
    console.log(response.data);
    if(response.data.mensaje === 'ok'){
        // NOTE: Refresco despues que updatea. Ve tu lo que quieres hacer.
        window.location.href = window.location.href;
    }
    })
    .catch(function(err) {
        console.log(err);
    });

})
