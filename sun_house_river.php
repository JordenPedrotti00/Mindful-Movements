1.  <?php
2.	 // Load required files
3.	 require_once('includes/functions.php');
4.	 require_once('includes/classes/QiGong.class.php');
5.	 
6.	 // Class to handle all Tai Chi and Qi Gong classes
7.	 class TaiChiClasses {
8.	 	
9.	 	public $classes;				  // Array containing list of all classes
10.		private $db;					  // Database connection
11.		
12.		// Construct function
13.		public function __construct() {		
14.			$this->classes = array();
15.			$this->db = new Database();
16.		}
17.		
18.		// Function to get list of all classes
19.		public function getClasses() {
20.			// Query the database
21.			$sql = 'SELECT * FROM tai_chi_classes';
22.			$result = $this->db->query($sql);
23.			
24.			// Iterate over results
25.			while($row = mysqli_fetch_assoc($result)) {
26.				// Create new QiGong object
27.				$qigong = new QiGong();
28.				$qigong->id = $row['id'];
29.				$qigong->name = $row['name'];
30.				$qigong->level = $row['level'];
31.				$qigong->description = $row['description'];
32.				
33.				// Add to classes array
34.				$this->classes[] = $qigong;
35.			}
36.			
37.			return $this->classes;
38.		}
39.		
40.		// Function to get a specific class
41.		public function getClass($id) {
42.			// Query the database
43.			$sql = "SELECT * FROM tai_chi_classes WHERE id = '$id'";
44.			$result = $this->db->query($sql);
45.			
46.			// Check for results
47.			if(mysqli_num_rows($result) == 0) {
48.				return false;
49.			}
50.			
51.			// Get row
52.			$row = mysqli_fetch_assoc($result);
53.			
54.			// Create QiGong object
55.			$qigong = new QiGong();
56.			$qigong->id = $row['id'];
57.			$qigong->name = $row['name'];
58.			$qigong->level = $row['level'];
59.			$qigong->description = $row['description'];
60.			
61.			return $qigong;
62.		}
63.		
64.		// Function to add a class
65.		public function addClass($name, $level, $description) {
66.			// Sanitize data
67.			$name = $this->db->sanitize($name);
68.			$level = $this->db->sanitize($level);
69.			$description = $this->db->sanitize($description);
70.			
71.			// Query the database
72.			$sql = "INSERT INTO tai_chi_classes (name, level, description)
73.					VALUES ('$name', '$level', '$description')";
74.			$result = $this->db->query($sql);
75.			
76.			// Check result
77.			if($result) {
78.				return true;
79.			}
80.			else {
81.				return false;
82.			}
83.		}
84.		
85.		// Function to update a class
86.		public function updateClass($id, $name, $level, $description) {
87.			// Sanitize data
88.			$id = $this->db->sanitize($id);
89.			$name = $this->db->sanitize($name);
90.			$level = $this->db->sanitize($level);
91.			$description = $this->db->sanitize($description);
92.			
93.			// Query the database
94.			$sql = "UPDATE tai_chi_classes
95.					SET name = '$name',
96.						level = '$level',
97.						description = '$description'
98.					WHERE id = '$id'";
99.			$result = $this->db->query($sql);
100.			
101.			// Check result
102.			if($result) {
103.				return true;
104.			}
105.			else {
106.				return false;
107.			}
108.		}
109.		
110.		// Function to delete a class
111.		public function deleteClass($id) {
112.			// Sanitize data
113.			$id = $this->db->sanitize($id);
114.			
115.			// Query the database
116.			$sql = "DELETE FROM tai_chi_classes WHERE id = '$id'";
117.			$result = $this->db->query($sql);
118.			
119.			// Check result
120.			if($result) {
121.				return true;
122.			}
123.			else {
124.				return false;
125.			}
126.		}
127.		
128.	 }
129.	 
130.	?>