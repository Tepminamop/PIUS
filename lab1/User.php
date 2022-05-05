<?php
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Validation;

class User
{
    public int $id;
    public string $name;
    public string $email;
    public string $password;
    private $creationTime;

    public function getCreationTime() {
        return $this->creationTime;
    }

    public function __construct(int $id, string $name, string $email, string $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->creationTime = strtotime(date('d.m.Y H.i.s'));
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('id', new Assert\NotBlank());
        $metadata->addPropertyConstraint('id', new Assert\Positive());
        $metadata->addPropertyConstraint('id', new Assert\NotNull());
        $metadata->addPropertyConstraint('name', new Assert\NotBlank());
        $metadata->addPropertyConstraint('name', new Assert\NotNull());
        $metadata->addPropertyConstraint('name', new Assert\Length(array(
            'min'        => 4,
            'max'        => 16,
        )));
        $metadata->addPropertyConstraint('password', new Assert\NotBlank());
        $metadata->addPropertyConstraint('password', new Assert\Length(array(
            'min'        => 4,
            'max'        => 16,
        )));
        $metadata->addPropertyConstraint('email', new Assert\Email(array()));
    }
}

echo "Checking from docs: " . '<br>';
$validator = Validation::createValidator();
$violations = $validator->validate('Bernhard', [
    new Assert\Length(['min' => 10]),
    new Assert\NotBlank(),
]);

if (0 !== count($violations)) {
    // there are errors, now you can show them
    foreach ($violations as $violation) {
        echo $violation->getMessage().'<br>';
    }
}

$user1 = new User(1, 'User1', 'user1@mail.ru', 'user1');
$user2 = new User(-1, 'User2', 'user2@mail.ru', 'user2');
$user3 = new User(1, 'User3', 'mailru', 'user3');

echo "Checking users: " . '<br>';

$validator = Validation::createValidatorBuilder()
    ->addMethodMapping('loadValidatorMetadata')
    ->getValidator();
$violations = $validator->validate($user1);
if (count($violations) > 0) {
    echo "Errors" . '<br>';
}
else {
    echo "No errors" . '<br>';
}

$violations = $validator->validate($user2);
if (count($violations) > 0) {
    echo "Errors" . '<br>';
}
else {
    echo "No errors" . '<br>';
}

$violations = $validator->validate($user3);
if (count($violations) > 0) {
    echo "Errors" . '<br>';
}
else {
    echo "No errors" . '<br>';
}
