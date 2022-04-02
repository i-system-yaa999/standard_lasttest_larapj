/* -------------------------------------------------- */
function nameChange() {
  // alert(nameChange);
  // if (document.getElementById('first_name').value == '' | document.getElementById('last_name').value == '') {
    // alert('error');
  // }
  // alert(fullname);
}
/* -------------------------------------------------- */
function genderChange(value) {
  // alert('genderChange');
  // alert(value);
}
/* -------------------------------------------------- */
function emailChange() {
  // alert('emailChange');
}
/* -------------------------------------------------- */
// function postcodeChange() {
//   // alert('postcodeChange');
//   let basepostcode = document.getElementById('postcode').value;
//   if (basepostcode.length == 8 && (basepostcode.indexOf('-') != -1|basepostcode.indexOf('ー') != -1)) {
//     let postcode = basepostcode.replace('ー', '-');
//     postcode = basepostcode.replace('-', '');
//     alert(this.toHankaku(postcode));
//     document.getElementById('postcode').value = this.toHankaku(postcode);
//   }
// }
/* -------------------------------------------------- */
function addressChange() {
  // alert('addressChange');
}
/* -------------------------------------------------- */
function opinionChange() {
  // alert('opinionChange');
}


/* -------------------------------------------------- */
// function toHankaku(str) {
//     return str.replace(/[Ａ-Ｚａ-ｚ０-９]/g, function(s) {
//         return String.fromCharCode(s.charCodeAt(0) - 0xFEE0);
//     });
// }

/* -------------------------------------------------- */
// function querySubmit() {
//   let fullname = document.getElementById('first_name').value + document.getElementById('last_name').value;
//   document.getElementById('full_name').value = fullname;
//   alert('送信');
// }


/* -------------------------------------------------- */
// function requestAddress(postcode) {
//   alert(postcode);
//   let form = document.createElement('form');
//   form.action = '/contact/postcode';
//   form.method = 'get';

//   let q = document.createElement('input');
//   // q.value = document.getElementById('postcode').value;
//   q.value = postcode;
//   q.name = 'postcode';

//   form.appendChild(q);
//   document.body.appendChild(form);

//   form.submit();
// }