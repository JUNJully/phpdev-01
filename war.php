<?php
class Forses {

private $name;
private $health;
private $armour;
private $damage;

public function __construct(string $name,int $health, int $armour, int $damage)
{
    $this -> name = $name;
    $this -> health = $health;
    $this -> armour = $armour;
    $this -> damage = $damage;
}
public function getName(): string
{
    return $this->name;
}
public function getHealth(): int
{
    return $this->health;
}

public function getArmour(): int
{
    return $this->armour;
}
public function getDamage(): int
{
    return $this->damage;
}

};
$pehota = new Forses('pehota',100,10,10);
$luchniki = new Forses('luchniki',100,5,20);
$konnica = new Forses('konnica',300,30,30);

class Army {
private $name;
private $units = [];
private $health;

public function __construct(string $name) {
    $this -> name = $name;
}
public function getName(): string
{
    return $this->name;
}
public function addUnits($unit, $count)
    {
        $this->units[$count] = $unit;
        return $this;
    }
public function getUnits() {
    $html = '';
    foreach($this->units as $count => $unit) {
       $html .= $unit->getName().'-'.$count.' ';
    }
    return $html;
}    
public function getDamage(){
    $damage = 0;
    foreach($this->units as $count => $unit) {
        $damage += $unit->getDamage() * $count;
    }
    return $damage;
} 
public function getHealth(){
    foreach($this->units as $count => $unit){
        $this->health += $unit->getHealth() * $count + $unit->getArmour() * $count;
    }
    return $this->health;
}     
};

$army1 = (new Army('Александр Ярославич'))->addUnits($pehota,200)->addUnits($luchniki,30)->addUnits($konnica,15);
$army2 = (new Army('Ульф Фасе'))->addUnits($pehota,90)->addUnits($luchniki,65)->addUnits($konnica,25);

class Battle {
private $side1;
private $side2;

public function __construct($side1, $side2) {
  $this -> side1 = $side1;
  $this -> side2 = $side2;
}
public function isWinner() {
  $duration = 0;
  $health1 = $this->side1->getHealth();
  $health2 = $this->side2->getHealth();
  $damage1 = $this->side1->getDamage();
  $damage2 = $this->side2->getDamage();
  while ( $health1 > 0 && $health2 > 0) {
     $health1 -= $damage2;
     $health2 -= $damage1;
     $duration++;
  }
 return [$health1,$health2];
}

//   
};
$battle = new Battle($army1,$army2);

?>
<table border="1">
<tr>
    <th></th>
    <th><?=$army1->getName()?></th>
    <th><?=$army2->getName()?></th>
</tr>
<tr>
    <th>Army units:</th>
    <td><?=$army1->getUnits()?></td>
    <td><?=$army2->getUnits()?></td>
</tr>
<tr>
    <th>Health after <?=$duration?> hits:</th>
    <td><?=$battle->isWinner()[0]?></td>
    <td><?=$battle->isWinner()[1]?></td>
</tr>
<tr>
    <th>Result</th>
    <td><?=$battle->isWinner()[0] > $battle->isWinner()[1] ? 'WINNER' : 'LOOSER'?></td>
    <td><?=$battle->isWinner()[1] > $battle->isWinner()[0] ? 'WINNER' : 'LOOSER'?></td>
</tr>
</table>


