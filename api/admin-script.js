document.addEventListener('DOMContentLoaded', function() {
    // Fetch current content
    fetch('get_content.php')
        .then(response => response.json())
        .then(result => {
            if (result.success && result.data) {
                const data = result.data;
                document.getElementById('title').value = data.title || '';
                document.getElementById('subtitle').value = data.subtitle || '';
                document.getElementById('instagramLink').value = data.instagram_link || '';
                document.getElementById('facebookLink').value = data.facebook_link || '';
                document.getElementById('gmailLink').value = data.gmail_link || '';
                document.getElementById('poweredBy').value = data.powered_by || '';
                
                if (data.profile_image) {
                    document.getElementById('currentProfile').src = 'uploads/' + data.profile_image;
                    document.getElementById('currentProfile').style.display = 'block';
                }
                if (data.background_image) {
                    document.getElementById('currentBackground').src = 'uploads/' + data.background_image;
                    document.getElementById('currentBackground').style.display = 'block';
                }
            } else {
                console.error('Error loading content:', result.error);
                alert('Error loading content: ' + (result.error || 'Unknown error'));
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error loading content. Please check the console for more details.');
        });

    // Handle form submission
    document.getElementById('updateForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        
        fetch('update_content.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Content updated successfully!');
                location.reload();
            } else {
                console.error('Error updating content:', data.message);
                alert('Error updating content: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error updating content. Please check the console for more details.');
        });
    });
});

