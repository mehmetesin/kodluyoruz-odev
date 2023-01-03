const blogData = [
    { title: 'title 1', post: 'post 1' },
    { title: 'title 2', post: 'post 2' },
    { title: 'title 3', post: 'post 3' },
];

function getPosts() {
    return new Promise((res, rej) => {
        console.log('Blog bilgileri anılıyor...');
        if (blogData && blogData.length > 0) {
            res(blogData);
        } else {
            rej('Hata: Blog bilgileri alınamadı!')
        }
    })
}

function addPost(post) {
    return new Promise((res, rej) => {
        let blogCount = blogData.length;
        console.log('Post ekleniyor...');
        if (post) {
            blogData.push(post);
            res('yeni post eklendi');
        } else {
            rej('hata: post eklenemedi!');
        }
    })
}

function postList(blogs) {
    blogs.map(blog => {
        console.log(blog.title);
        console.log(blog.post);
        console.log('');
    })
}

async function process() {
    try {
        let blogs = await getPosts();
        postList(blogs);

        const result = await addPost({ title: 'yeni title', post: 'yeni post' })
        console.log(result);
        console.log('');

        blogs = await getPosts();
        console.log('yeni postlar');
        postList(blogs);
    } catch (err) {
        console.log(err);
    }

}

process();