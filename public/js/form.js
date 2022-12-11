function enable() {
    var x = document.querySelectorAll('.form-control');
    const y = document.getElementById('foto');
    var z = document.createElement("input");

    const a = document.getElementById('berkas');
    var b = document.createElement("input");
    z.setAttribute('type', 'file');
    z.setAttribute('name', 'foto');
    z.setAttribute('class', 'form-control');
    b.setAttribute('type', 'file');
    b.setAttribute('name', 'berkas');
    b.setAttribute('class', 'form-control');
    x.forEach(x => {
        x.removeAttribute('disabled');
    });
    y.appendChild(z);
    a.appendChild(b);
}

// function tes() {
//     var value = document.querySelectorAll('.form-control');
//     var val = "<?php echo $pendaftar ?>";
//     if (val.length == 0) {
//         value.forEach(x => {
//             value.removeAttribute('value');
//         });
//     }
// }
