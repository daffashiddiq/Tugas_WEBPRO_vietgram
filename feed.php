<!DOCTYPE html>
<html lang="en">

<?php 
            include "koneksi.php";
            // if(!$_SESSION['username']){
            //     header("Location: index.php");
            // }

            $username = $_SESSION['username'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Feed | Vietgram</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <nav class="navigation">
        <div class="navigation__column">
            <a href="feed.php">
                <!-- Master branch comment -->
                <img src="images/logo.png" />
            </a>
        </div>
        <div class="navigation__column">
            <i class="fa fa-search"></i>
            <form action="feed.php" method="post">
            <input type="text" placeholder="Search" name="search" >
            </form>
        </div>
        <div class="navigation__column">
            <ul class="navigations__links">
                <li class="navigation__list-item" style="position:relative; bottom:2px;">
                    <a href="uploadImage.php" class="navigation__link">
                    <svg aria-label="New Post" class="_8-yf5 " fill="#262626" height="24" viewBox="0 0 48 48" width="24"><path d="M31.8 48H16.2c-6.6 0-9.6-1.6-12.1-4C1.6 41.4 0 38.4 0 31.8V16.2C0 9.6 1.6 6.6 4 4.1 6.6 1.6 9.6 0 16.2 0h15.6c6.6 0 9.6 1.6 12.1 4C46.4 6.6 48 9.6 48 16.2v15.6c0 6.6-1.6 9.6-4 12.1-2.6 2.5-5.6 4.1-12.2 4.1zM16.2 3C10 3 7.8 4.6 6.1 6.2 4.6 7.8 3 10 3 16.2v15.6c0 6.2 1.6 8.4 3.2 10.1 1.6 1.6 3.8 3.1 10 3.1h15.6c6.2 0 8.4-1.6 10.1-3.2 1.6-1.6 3.1-3.8 3.1-10V16.2c0-6.2-1.6-8.4-3.2-10.1C40.2 4.6 38 3 31.8 3H16.2z"></path><path d="M36.3 25.5H11.7c-.8 0-1.5-.7-1.5-1.5s.7-1.5 1.5-1.5h24.6c.8 0 1.5.7 1.5 1.5s-.7 1.5-1.5 1.5z"></path><path d="M24 37.8c-.8 0-1.5-.7-1.5-1.5V11.7c0-.8.7-1.5 1.5-1.5s1.5.7 1.5 1.5v24.6c0 .8-.7 1.5-1.5 1.5z"></path></svg>
                    </a>
                </li>
                <li class="navigation__list-item">
                    <a href="explore.php" class="navigation__link">
                        <i class="fa fa-compass fa-lg"></i>
                    </a>
                </li>
                <li class="navigation__list-item">
                    <a href="#" class="navigation__link">
                        <i class="fa fa-heart-o fa-lg"></i>
                    </a>
                </li>
                <li class="navigation__list-item">
                    <a href="profile.php?username=<?= $username ?>" class="navigation__link">
                        <i class="fa fa-user-o fa-lg"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <main id="feed">

        <?php 
            error_reporting(0);
            $data = mysqli_query($koneksi,"select * from photo");
            $search = $_POST['search'];
            $query = "select * from photo inner join user on user.username = photo.username where caption like '%".$search."%'";
            $dataSearch = mysqli_query($koneksi, $query);
            $rows = mysqli_num_rows($dataSearch);
            if($rows >= 1){
            while($result = mysqli_fetch_array($dataSearch)){
        ?>
            <div class="photo">
            <header class="photo__header">
                <img src="images/avatar.jpg" class="photo__avatar" />
                <div class="photo__user-info">
                    <span class="photo__author"><?= $result['username'] ?></span>
                    <span class="photo__location">Bestechung</span>
                </div>
            </header>
            <img src="<?= $result['url'] ?>" />
            <div class="photo__info">
                <div class="photo__actions">
                    <span class="photo__action">
                        <i class="fa fa-heart-o fa-lg"></i>
                    </span>
                    <span class="photo__action">
                        <i class="fa fa-comment-o fa-lg"></i>
                    </span>
                </div>
                <span class="photo__likes"><?= $result['likes'] ?> likes</span>
                <span class="photo__caption"><?= $result['caption'] ?></span>
                <span class="photo__time-ago">2 hours ago</span>
                <div class="photo__add-comment-container">
                    <textarea name="comment" placeholder="Add a comment..."></textarea>
                    <i class="fa fa-ellipsis-h"></i>
                </div>
            </div>
        </div>
        <?php } ?>
    <?php
            }else{ 
            while($d = mysqli_fetch_array($data)){ ?>
        <div class="photo">
            <header class="photo__header">
                <img src="images/avatar.jpg" class="photo__avatar" />
                <div class="photo__user-info">
                    <span class="photo__author"><?= $username ?></span>
                    <span class="photo__location">Bestechung</span>
                </div>
            </header>
            <img src="<?= $d['url'] ?>" />
            <div class="photo__info">
                <div class="photo__actions">
                    <span class="photo__action">
                        <i class="fa fa-heart-o fa-lg"></i>
                    </span>
                    <span class="photo__action">
                        <i class="fa fa-comment-o fa-lg"></i>
                    </span>
                </div>
                <span class="photo__likes"><?= $d['likes'] ?> likes</span>
                <span class="photo__caption"><?= $d['caption'] ?></span>
                <span class="photo__time-ago">2 hours ago</span>
                <div class="photo__add-comment-container">
                    <textarea name="comment" placeholder="Add a comment..."></textarea>
                    <i class="fa fa-ellipsis-h"></i>
                </div>
            </div>
        </div>

        <?php
            }
        }
        ?>

    </main>
    <footer class="footer">
        <div class="footer__column">
            <nav class="footer__nav">
                <ul class="footer__list">
                    <li class="footer__list-item"><a href="#" class="footer__link">About Us</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Support</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Blog</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Press</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Api</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Jobs</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Privacy</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Terms</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Directory</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Language</a></li>
                </ul>
            </nav>
        </div>
        <div class="footer__column">
            <span class="footer__copyright">© 2017 Vietgram</span>
        </div>
    </footer>
</body>

</html>