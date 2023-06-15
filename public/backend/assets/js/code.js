function editImage(itemId) {
    // Define the image source based on the server-side logic
    const imageSource =
        "{{ !empty($item->multi_images) ? url($item->multi_images) : url('backend/assets/images/small/img-5.jpg') }}";

    // Display SweetAlert2 modal for editing
    Swal.fire({
        title: 'Edit Image',
        html: `
<img class="rounded avatar-xl" src="${imageSource}" id="showimage" alt="Card image cap">
<br>
<input class="form-control" type="file" name="multi_images" id="image" required>
<div class="text-end mt-3">
<button class="btn btn-secondary" onclick="Swal.close()">Close</button>
<button class="btn btn-info" onclick="saveEditedImage(${itemId})">Save</button>
</div>
`,
        showCloseButton: false,
        showCancelButton: false,
        showConfirmButton: false,
    });
}

function saveEditedImage(itemId) {
    const file = document.getElementById('image').files[0];
    // Perform the necessary actions with the edited image (e.g., upload, update database, etc.)
    console.log('Edited image file:', file);
    // Close the SweetAlert2 modal
    Swal.close();
}

$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete This Data?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
                    }
                  }) 


    });

  });
