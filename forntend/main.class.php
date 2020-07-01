<?php 
class main
{
	protected $name='homestay';
	protected $localhost='localhost';
	protected $root='root';
	protected $password='';
	protected $connect;
	public $db;
	
	 function __construct()
	 {
		 $this->connect();
	 }
	
	public function connect()
	{
		$this->db=new PDO("mysql:host=$this->localhost;dbname=$this->name",$this->root,$this->password);
	}
	

	//function Start for places
	

	public function findAllPlaceses()
	{
		$sql=$this->db->query("select * from `place` ");
		return $fetch=$sql->fetchAll();
	}
	

	//function End for places

	//function Start for Explore BookHomestays
	

	public function findAllExploreBookHomestays()
	{
		$sql=$this->db->query("select * from `main_categories` ");
		return $fetch=$sql->fetchAll();
	}

	//function End for Explore BookHomestays

	//function Start for holiday spot
	

	public function findAllHolidaySpot()
	{
		$sql=$this->db->query("select * from `holiday_categories` ");
		return $fetch=$sql->fetchAll();
	}

	public function findSpecificHolidaySpot($id)
	{
		$show=$this->db->query("select * from `holiday_categories` WHERE `id`='$id' ");
		$singel=$show->fetchAll();
		return $singel[0];
	}

	public function findAllPropertyByHolidaySpot($id)
	{
		$sql=$this->db->query("select * from `properties`  WHERE `holiday_category`='$id' ORDER BY FIELD(rank, 1,2,3,4,5) ");
		return $fetch=$sql->fetchAll();
	}

	public function findListPriceByHolidaySpot($id)
	{
		$show=$this->db->query("select * from `properties` WHERE `holiday_category`='$id' ORDER BY `price`");
		$singel=$show->fetchAll();
		return $singel[0];
	}

	//function End for holiday spot

	//function Start for Place
	

	public function findAllPlace()
	{
		
		$sql=$this->db->query("select * from `place` ORDER BY `id` ASC");
		return $fetch=$sql->fetchAll();
	}

	//function End for  Place

	//function Start for Homes with comforts
	

	public function findAllHomesComforts()
	{
		$sql=$this->db->query("select * from `comfort_categories` ");
		return $fetch=$sql->fetchAll();
	}

	public function findAllPropertyByHomesComforts($id)
	{
		$sql=$this->db->query("select * from `properties`  WHERE `confort_id`='$id' ORDER BY FIELD(rank, 1,2,3,4,5) ");
		return $fetch=$sql->fetchAll();
	}

	public function findListPriceByHomesComforts($id)
	{
		$show=$this->db->query("select * from `properties` WHERE `confort_id`='$id' ORDER BY `price`");
		$singel=$show->fetchAll();
		return $singel[0];
	}

	//function End for Homes with comforts

	//function Start for Recommended for you 

	public function findAllPropertyByPlace($id)
	{
		$sql=$this->db->query("select * from `properties`  WHERE `placeid`='$id' ORDER BY FIELD(rank, 1,2,3,4,5) ");
		return $fetch=$sql->fetchAll();
	}
	

	public function findAllPropertyHiRating()
	{
		$sql=$this->db->query("select * from `properties`  WHERE `rating` BETWEEN 3 AND 5 ");
		return $fetch=$sql->fetchAll();
	}

	public function findListPriceByPlace($id)
	{
		$show=$this->db->query("select * from `properties` WHERE `placeid`='$id' ORDER BY `price`");
		$singel=$show->fetchAll();
		return $singel[0];
	}

	//function End for Recommended for you

	//function Start for Seasons 
	

	public function findAllSeasons()
	{
		$sql=$this->db->query("select * from `seasons` ");
		return $fetch=$sql->fetchAll();
	}

	public function findAllPropertyBySeasons($id)
	{
		$sql=$this->db->query("select * from `properties`  WHERE `season_id`='$id' ORDER BY FIELD(rank, 1,2,3,4,5) ");
		return $fetch=$sql->fetchAll();
	}

	public function findSpecificPropDtls($id)
	{
		$show=$this->db->query("select * from `properties` WHERE `id`='$id' ");
		$singel=$show->fetchAll();
		return $singel[0];
	}

	//function End for Seasons

	//function Start for Property Pics 

	public function findSpecPropertyAllPic($id)
	{
		$sql=$this->db->query("select * from `property_room_pics`  WHERE `property_id`='$id' ");
		return $fetch=$sql->fetchAll();
	}

	//function End for Property Pics 

	//function Start for Host Details

	public function findSpecificHostDtls($id)
	{
		$show=$this->db->query("select * from `host` WHERE `id`='$id' ");
		$singel=$show->fetchAll();
		return $singel[0];
	}

	//function Start for Host Details 

	//function Start for Property Room Detalis 

	public function findSpecPropertyAllRoomDtls($id)
	{
		$sql=$this->db->query("select * from `room_details`  WHERE `property_id`='$id' ");
		return $fetch=$sql->fetchAll();
	}

	//function End for Property Room Detalis 

	//function Start for Experience with the Stars

	public function findAllExperiencewithDaStars()
	{
		$sql=$this->db->query("select * from `superstar`");
		return $fetch=$sql->fetchAll();
	}

	public function findSpecificStExpDtls($id)
	{
		$show=$this->db->query("select * from `superstar` WHERE `id`='$id' ");
		$singel=$show->fetchAll();
		return $singel[0];
	}

	//function End for Experience with the Stars 

	//function Start for Food Blogs

	public function findAllFoodBlogs()
	{
		$sql=$this->db->query("select * from `food_blog`");
		return $fetch=$sql->fetchAll();
	}

	public function findSpecificFoodBlogs($id)
	{
		$show=$this->db->query("select * from `food_blog` WHERE `id`='$id' ");
		$singel=$show->fetchAll();
		return $singel[0];
	}

	//function End for Food Blogs




	
}	

$object=new main();
?>