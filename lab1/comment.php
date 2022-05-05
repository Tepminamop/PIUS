<?php
include 'vendor/autoload.php';
include 'user.php';

class Comment {
    public string $msg;
    public User $user;

    public function __construct(User $user, string $msg)
    {
        $this->msg = $msg;
        $this->user = $user;
    }
}

$user1 = new User(1, 'user1', 'user1@mail.ru', 'pass1');
$user2 = new User(2, 'user2', 'user2@mail.ru', 'pass2');
$user3 = new User(3, 'user3', 'user3@mail.ru', 'pass3');

$userArray = [$user1, $user2, $user3];

$comment1 = new Comment($userArray[0], "message1");
$comment2 = new Comment($userArray[1], "message2");
$comment3 = new Comment($userArray[2], "message3");

$commentArray = [$comment1, $comment2, $comment3];
?>

<?php
if ($_POST) {
    $time = strtotime($_POST["inputTime"]);
    $time = date('d.m.Y H.i.s', $time);
    foreach ($commentArray as $comment) {
        if (date('d.m.Y H.i.s', $comment->user->getCreationTime()) > $time) {
            echo $comment->msg . '<br>';
        }
    }
}
?>
<form action="" method="post">
    Input date and submit:
    <input type="datetime-local" name="inputTime" /><br/>
    <input type="submit"/><br/>
</form>
