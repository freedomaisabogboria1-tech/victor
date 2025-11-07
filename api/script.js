document.addEventListener('DOMContentLoaded', function() {
    // Fetch page content from the server
    fetch('get_content.php')
        .then(response => response.json())
        .then(result => {
            if (result.success && result.data) {
                const data = result.data;
                document.getElementById('pageTitle').textContent = data.title || '';
                document.getElementById('subtitle').textContent = data.subtitle || '';
                
                if (data.profile_image) {
                    const profileImg = document.getElementById('profileImage');
                    profileImg.src = 'uploads/' + data.profile_image;
                    profileImg.onerror = function() {
                        console.error('Failed to load profile image');
                        this.src = 'images/default-profile.jpg'; // Fallback image
                    };
                }

                document.getElementById('instagramLink').href = data.instagram_link || '#';
                document.getElementById('facebookLink').href = data.facebook_link || '#';
                document.getElementById('gmailLink').href = data.gmail_link || '#';
                document.getElementById('poweredBy').textContent = data.powered_by || '';
                
                if (data.background_image) {
                    const overlay = document.createElement('div');
                    overlay.style.position = 'fixed';
                    overlay.style.top = '0';
                    overlay.style.left = '0';
                    overlay.style.width = '100%';
                    overlay.style.height = '100%';
                    overlay.style.backgroundImage = `url('uploads/${data.background_image}')`;
                    overlay.style.backgroundSize = 'cover';
                    overlay.style.backgroundPosition = 'center';
                    overlay.style.opacity = '0.5'; // Adjust opacity (0 to 1)
                    overlay.style.zIndex = '-1';
                    document.body.appendChild(overlay);
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
});

