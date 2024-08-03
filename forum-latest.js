window.customElements.define(
    'forum-latest',
    class extends HTMLElement {
        constructor() {
            super();

            const that = this;
            const list = document.createElement('ul');

            fetch('//forum.myriga.info/latest_posts.php')
                .then(
                    response => {
                        that.innerHTML = '';
                        that.appendChild(list);
                        return response.json()
                    }
                )
                .then(
                    response => response.forEach(
                        (post) => {
                            const li = document.createElement('li');
                            const a = document.createElement('a');
                            a.href = post.url.replace('&amp;', '&');
                            a.innerHTML = post.title;
                            li.appendChild(a);
                            list.appendChild(li);
                        }
                    )
                )
        }
    }
);
