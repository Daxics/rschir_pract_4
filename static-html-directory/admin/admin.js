async function getPosts() {
    let res = await fetch('http://localhost:8080/api/posts');
    let posts = await res.json();

    posts.forEach((post) => {
        document.querySelector('.post-list').innerHTML += `

            <div class="card">
                <img src="${post.art}" alt="">
                <h5 class="post-disc">${post.disc}</h5>
            </div>
        `
    })


}

getPosts();