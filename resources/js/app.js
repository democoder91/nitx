require('./bootstrap');
//
// const {Dropzone} = require("dropzone");
// // const dropzone = new Dropzone(".dropzone", {url: "/file/post"});
//
//
// var dropzone = new Dropzone(".dropzone", {
//     maxFilesize: 10,
//     acceptedFiles: ".jpeg,.jpg,.png,.gif,.mp4",
//     addRemoveLinks: true,
//     removedfile: function (file) {
//         var fileName = file.name;
//         $.ajax({
//             type: 'POST',
//             url: "{{route('media_owner.remove_media')}}",
//             data: {"_token": "{{ csrf_token() }}", fileName: fileName},
//             sucess: function (data) {
//             }
//         });
//         var _ref;
//         return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
//     }
// });