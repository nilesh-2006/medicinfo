<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latest Medicine Price Information</title>
<style>
    body {
        font-family: 'Times New Roman', Times, serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }
    .container {
        width: 90%;
        max-width: 800px;
        margin: 20px auto;
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        position: relative;
    }
    h1 {
        text-align: center;
        font-size: 24px;
    }
    .info-section {
        margin-bottom: 20px;
        padding: 10px;
        background: #e9ecef;
        border-radius: 5px;
    }
    .posts {
        margin-top: 20px;
    }
    .post {
        border-bottom: 1px solid #ddd;
        padding: 10px;
        position: relative;
    }
    .delete-btn {
        position: absolute;
        right: 10px;
        top: 10px;
        background: red;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        border-radius: 4px;
        width: 10%;
    }  
    .add-post {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        z-index: 1000;
        background-color: rgb(43, 175, 74);
        width: 90%;
        max-width: 400px;
    }
    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 999;
    }
    .plus-btn-top {
            position: absolute;
            top: 10px;
            right: 4px;
            background: #28a745;
            color: white;
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            font-size: 20px;
            cursor: pointer;
        }
    textarea {
        width: 100%;
        height: 100px;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }
    button {
       
        width: 30%;
        padding: 10px;
        margin-top: 15px;
        
        border-radius: 2px;
        cursor: pointer;
    }
    .add-post button {
        background-color: #007bff;
        color: white;
    }
    .add-post button:last-child {
        background-color: red;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .container {
            width: 95%;
        }
        .plus-btn-top {
            width: 35px;
            height: 35px;
            font-size: 12px;
        }
        h1 {
            font-size: 20px;
        }
        .add-post {
            width: 80%;
        }
        .delete-btn {
            padding: 3px 6px;
            font-size: 12px;
            
        }
    }

    @media (max-width: 480px) {
        .container {
            padding: 10px;
        }
        .info-section {
            font-size: 14px;
        }
        .add-post {
            width: 90%;
        }
        textarea {
            height: 80px;
        }
    }
</style>
</head>
<body>
<?php include('../header2.php') ?>
    <div class="container">
        <button class="plus-btn-top" onclick="openDialog()">+</button>
        <h1>Latest Medicine Price Information</h1>
        
        <div class="info-section">
            <h2>Updates on Site</h2>
            <p>- New medicines and price updates added daily.</p>
            <p>- User reviews and ratings for medicines.</p>
            <p>- Verified sources for price accuracy.</p>
        </div>
        
        <div class="info-section">
            <h2>User Needs</h2>
            <p>- Search functionality for medicine prices.</p>
            <p>- Price comparison from multiple sources.</p>
            <p>- Option to request price updates for specific medicines.</p>
        </div>
        
        <div class="posts" id="posts"></div>
    </div>

    
    <div class="overlay" id="overlay" onclick="closeDialog()"></div>
    <div class="add-post" id="addPostBox">
        <textarea id="postContent" placeholder="Share latest medicine price information..."></textarea>
        <p id="postDateTime"></p>
        <button onclick="addPost()">Post</button>
        <button onclick="closeDialog()">Close</button>
    </div>
 

    <script>
    // Load posts from local storage when the page loads
    window.onload = function() {
        loadPosts();
    };

    function openDialog() {
        document.getElementById('postDateTime').innerText = 'Date & Time: ' + new Date().toLocaleString();
        document.getElementById('addPostBox').style.display = 'block';
        document.getElementById('overlay').style.display = 'block';
    }
    
    function closeDialog() {
        document.getElementById('addPostBox').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
    }
    
    function addPost() {
        let postText = document.getElementById('postContent').value;
        if (postText.trim() === '') return;
        
        let dateTime = new Date().toLocaleString();
        let post = { text: postText, time: dateTime };

        let posts = JSON.parse(localStorage.getItem('posts')) || [];
        posts.unshift(post); // Add new post at the beginning
        localStorage.setItem('posts', JSON.stringify(posts));

        displayPosts();
        document.getElementById('postContent').value = '';
        closeDialog();
    }

    function loadPosts() {
        let posts = JSON.parse(localStorage.getItem('posts')) || [];
        posts.forEach(post => addPostToDOM(post.text, post.time));
    }

    function displayPosts() {
        document.getElementById('posts').innerHTML = "";
        loadPosts();
    }

    function addPostToDOM(text, time) {
        let postDiv = document.createElement('div');
        postDiv.classList.add('post');
        postDiv.innerHTML = `<p class='timestamp'>${time}</p>
                             <p class='content'>${text}</p>
                             <button class='delete-btn' onclick='deletePost(this)'>Delete</button>`;
        
        document.getElementById('posts').appendChild(postDiv);
    }

    function deletePost(button) {
        let postDiv = button.parentElement;
        let text = postDiv.querySelector('.content').innerText;
        let time = postDiv.querySelector('.timestamp').innerText;

        let posts = JSON.parse(localStorage.getItem('posts')) || [];
        posts = posts.filter(post => post.text !== text || post.time !== time);
        localStorage.setItem('posts', JSON.stringify(posts));

        postDiv.remove();
    }
</script>

     <?php include('../Footer2.php') ?>
</body>
</html>