function deleteRessource(id) {
    if (!confirm("Voulez-vous vraiment supprimer cette ressource ?")) return;

    fetch('/api/v1/ressource/delete/' + id, { 
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Ressource supprimée !");
            location.reload();
        } else {
            alert("Erreur: " + data.message);
        }
    })
    .catch(error => console.error('Erreur:', error));
}

function modifyRessource(id) {

    var name = document.getElementById('name').value;
    var description = document.getElementById('description').value;
    var long_description = document.getElementById('long_description').value;
    var image = document.getElementById('image').files[0];
    var image_source = document.getElementById('image_src').value;
    var website = document.getElementById('website').value;
    var is_free = document.getElementById('is_free').value;
    var status = document.getElementById('status').value;
    var rating = document.getElementById('rating').value;
    var creation_date = document.getElementById('creation_date').value;
    var type = document.getElementById('type').value;
    var slug = document.getElementById('slug').value;

    const formData = new FormData();
    formData.append('name', name);
    formData.append('description', description);
    formData.append('long_description', long_description);
    formData.append('website', website);
    formData.append('is_free', is_free);
    formData.append('status', status);
    formData.append('rating', rating);
    formData.append('creation_date', creation_date);
    formData.append('type', type);
    formData.append('slug', slug);

    if (image != null) {
        formData.append('image', image);
    }
    else if(image_source){
        formData.append('image_src', image_source);
    }


    fetch('/api/v1/ressource/modify/' + id, {
        method: 'POST',  
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Ressource mise à jour avec succès !");
            window.location.href = "/"
        } else {
            alert("Erreur: " + data.message);
        }
        })
        .catch(error => console.error('Erreur:', error));
    }

function addRessource() {
    var name = document.getElementById('name').value;
    var description = document.getElementById('description').value;
    var long_description = document.getElementById('long_description').value;
    var image = document.getElementById('image').files[0];
    var website = document.getElementById('website').value;
    var is_free = document.getElementById('is_free').value;
    var status = document.getElementById('status').value;
    var rating = document.getElementById('rating').value;
    var type = document.getElementById('type').value;
    var slug = document.getElementById('slug').value;

    // Create the object with updated values
    const formData = new FormData();
    formData.append('name', name);
    formData.append('description', description);
    formData.append('long_description', long_description);
    formData.append('image', image);
    formData.append('website', website);
    formData.append('is_free', is_free);
    formData.append('status', status);
    formData.append('rating', rating);
    formData.append('type', type);
    formData.append('slug', slug);

    // Send the updated data using a POST request
    fetch('/api/v1/ressource/add', {
        method: 'POST', 
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Ressource créer avec succès !");
            window.location.href = "/"
        } else {
            alert("Erreur: " + data.message);
        }
        })
        .catch(error => console.error('Erreur:', error));
    }

