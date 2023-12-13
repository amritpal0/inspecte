Dropzone.autoDiscover = false;
$("#mydropzone").dropzone({

    // Prevents Dropzone from uploading dropped files immediately
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 100,
    maxFiles: 100,
    addRemoveLinks: true,
    acceptedFiles: "image/jpeg,image/jpg,image/png,image/gif",
    init: function() {
        var submitButton = document.querySelector("#add-imgs")
        myDropzone = this; // closure

        submitButton.addEventListener("click", function(e) {
            e.preventDefault();
            e.stopPropagation();
            if ($('.select-album').val() == '') {
                alertify.warning('Please select album');
            } else if (myDropzone.getQueuedFiles().length == 0) {
                //submitform();
                alertify.warning('Please select some images');
            } else {
                myDropzone.processQueue();
            }
        });

        this.on("sending", function(file, xhr, formData) {
            formData.append("_token", CSRF_TOKEN);

        });

        this.on("success", function(file, response) {
            if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                var _this = this;
                _this.removeAllFiles();
                var data = response;
                if (data.success === 1) {
                    window.location.reload();

                    //albumid is defined on allbum-images.php
                }
                if (data.success == 0) {
                    alertify.warning(data.msg);
                }
            }
        });

        this.on("complete", function() {
            // If all files have been uploaded
            if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
                var _this = this;
                // Remove all files
                _this.removeAllFiles();
            }
            //location.reload();
        });

    }
});

$("#mydropzone1").dropzone({

    // Prevents Dropzone from uploading dropped files immediately
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 100,
    maxFiles: 100,
    addRemoveLinks: true,
    acceptedFiles: "image/jpeg,image/jpg,image/png,image/gif",
    init: function() {
        var submitButton = document.querySelector("#add-imgs")
        myDropzone = this; // closure

        submitButton.addEventListener("click", function(e) {
            e.preventDefault();
            e.stopPropagation();
            if ($('.select-album').val() == '') {
                alertify.warning('Please select album');
            } else if (myDropzone.getQueuedFiles().length == 0) {
                //submitform();
                alertify.warning('Please select some images');
            } else {
                myDropzone.processQueue();
            }
        });

        this.on("sending", function(file, xhr, formData) {
            formData.append("_token", CSRF_TOKEN);

        });

        this.on("success", function(file, response) {
            if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                var _this = this;
                _this.removeAllFiles();
                var data = response;
                if (data.success === 1) {
                    window.location.reload();

                    //albumid is defined on allbum-images.php
                }
                if (data.success == 0) {
                    alertify.warning(data.msg);
                }
            }
        });

        this.on("complete", function() {
            // If all files have been uploaded
            if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
                var _this = this;
                // Remove all files
                _this.removeAllFiles();
            }
            //location.reload();
        });

    }
});

$("#placementdropzone").dropzone({

    // Prevents Dropzone from uploading dropped files immediately
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 100,
    maxFiles: 100,
    addRemoveLinks: true,
    acceptedFiles: "image/jpeg,image/jpg,image/png,image/gif",
    init: function() {
        var submitButton = document.querySelector("#padd-imgs")
        myDropzone = this; // closure

        submitButton.addEventListener("click", function(e) {
            e.preventDefault();
            e.stopPropagation();
            if ($('.select-album').val() == '') {
                alertify.warning('Please select album');
            } else if (myDropzone.getQueuedFiles().length == 0) {
                //submitform();
                alertify.warning('Please select some images');
            } else {
                myDropzone.processQueue();
            }
        });

        this.on("sending", function(file, xhr, formData) {
            formData.append("_token", CSRF_TOKEN);
        });

        this.on("success", function(file, response) {
            if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                var _this = this;
                _this.removeAllFiles();
                var data = response;
                if (data.success === 1) {
                    alertify.success(data.msg);
                    //albumid is defined on allbum-images.php
                }
                if (data.success == 0) {
                    alertify.warning(data.msg);
                }
            }
        });

        this.on("complete", function() {
            // If all files have been uploaded
            if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
                var _this = this;
                // Remove all files
                _this.removeAllFiles();
            }
            //location.reload();
        });

    }
});