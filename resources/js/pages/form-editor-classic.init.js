/*
Template Name: Tailwick - Admin & Dashboard Template
Author: Themesdesign
Website: https://themesdesign.in/
Contact: Themesdesign@gmail.com
File: Form editor Classic Js File
*/

// ckeditor Classic
var ckClassicEditor = document.querySelectorAll(".ckeditor-classic")
if (ckClassicEditor) {
    Array.from(ckClassicEditor).forEach(function () {
        ClassicEditor
            .create(document.querySelector('.ckeditor-classic'))
            .then(editor => {
                console.log(editor.getData());
            })
            .catch(function (error) {
                console.error(error);
            });
    });
}
