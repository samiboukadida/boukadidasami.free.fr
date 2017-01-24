<p>Here is a list of all posts:</p>

<?php foreach($viewModel->get('posts') as $post) { ?>
    <p>
        <?php echo $post->author; ?>
        <a href='?controller=blog&action=showPost&id=<?php echo $post->id; ?>'>See content</a>
    </p>
<?php } ?>