<body>
<div class="container">
    <div class="blogName">
        <h2>Make it dynamic</h2>
        <span>
            <h3>January 10, 2023</h3>
            <h3 class="tag">Project</h3>
        </span>
    </div><p>I had a lot of fun working on this website. But it quickly out-grew what I intended it to be. This project was meant to be my online portfolio that I could put on my resume but then I added blogs and projects so few things had to change.</p>
<h4>My relationship with PHP</h4>
<p>I am not a big fan of this programming language. My website programming teacher could tell you a lot about that. I have never thought I would ever make a website so learning it was something I resisted doing, but then the day came and I had to learn everything about website development on my own. Honestly, this was the most fun I had in a long time. I pushed myself out of my comfort zone aka back-end and made this.</p>
<h4>Why the change?</h4>
<p>Writing blogs in Microsoft Word and then editing them manually was a pain in the ass but it did the trick for the time being. But having to do this more than once and then modify index.html just for my post to be visible was too much for too little in return. Two days ago, I decided to rewrite my website in PHP .... but how does it work behind the scene?</p>
<h4>A quick look behind the curtain</h4>
<p>I wrote an automatic blog adding to the landing page. It "scans" the blog folder and then every sub-folder. Once it has finished this process, it sorts them from newest to oldest, takes the title, tag, and first paragraph of every blog post, and puts them on the page. But that's just half of the story.  How am I adding new blogs ? I made a new page just for that. I have a dynamic editor which can be expanded based on how many "chapters" and paragraphs I am writing. By clicking on the Upload button it sends a POST request to itself and processes it by taking the title, tag, and current date first and adding it to the top of the page. The second thing that is done is the text itself. It is a simple for-each loop that checks if it's a chapter header or a paragraph and decides based on that. The result is then saved to a special folder and a link is displayed. Basically, anyone can upload blogs to my website but only I or the person with FTP access to my website can move these blog posts to the actual blog directory. </p>
<h4>How does the editor look like ?</h4>
<p>I tried to mimic the blog page so it's kinda like a live preview. Take a look :D
The plus button adds a new chapter name and a paragraph. The upload button is self-explanatory.</p>
<img src="blog/img/2023/editor.png"></img>
<a href="index.php">
<h3>
    « BACK
</h3>
</a>
</div>
</body>
