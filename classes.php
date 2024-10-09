<?php

class user {
    public $fname, $lname, $email, $siscode;

}
class student {
    public $fname, $lname, $email; 
    public $siscode;
    public $gender, $dob, $pob, $nationality, $maritalstatus, $insnb;
    public $sPhoneNumber, $sCity, $sStreet, $sBuilding, $sFloor, $sRegion;
    public $bac, $bacnumber, $school;

    public $otherdegreeslevels=array();
    public $otherdegreesnames=array();
    public $otherdegreesnumbers=array();
    public $otherdegreesyears=array();

    public $branchname, $major, $languages;
    public $semester1, $semester2;

    public function getsiscode() {
        return $this->siscode;
    }

    public function setsiscode($siscode) {
        $this->siscode = $siscode;
    }
}


class professor {
    public $fname, $lname, $email;
    public $siscode; 
    public $gender,$dob, $pob, $nationality, $maritalstatus, $insnb; 
    public $pPhoneNumber, $pCity, $pStreet, $pBuilding, $pFloor, $pRegion;
    public $bac, $bacnumber, $school;

    public $degrees=array();
    public $degreesnumbers=array();
    public $degreesyears=array();

    public $otherdegreeslevels=array();
    public $otherdegreesnames=array();
    public $otherdegreesnumbers=array();
    public $otherdegreesyears=array();

    public $branch;
    public $taughtmajors=array();
    public $languages;

    public $taughtyears;
    public $taughtcourses;

    
    public function getsiscode() {
        return $this->siscode;
    }

    public function setsiscode($siscode) {
        $this->siscode = $siscode;
    }
}

class branch {
    public $name, $address, $email, $phone;

    function __construct($name, $address, $email, $phone) {
        $this->name = $name;
        $this->address=$address;
        $this->email=$email;
        $this->phone=$phone;
    }
}

$branch1=new branch('Hadath', 'BMU Campus, Hadath, Building 5', 'bmu.hadath@gmail.com', '01 250 100');
$branch2=new branch('Akkar', 'BMU Campus, Akkar, Building 2', 'bmu.akkar@gmail.com', '06 250 100');
$branch3=new branch('Koura', 'BMU Campus, Koura, Building 4', 'bmu.koura@gmail.com', '06 250 251');



class majors {
    public $majors=[
        'Artificial Intelligence', 'Computer Engineering', 'Computer Graphics',
        'Computer Network', 'Computer Science', 'Cybersecurity',
        'Data Science', 'Game Development', 'Information Systems',
        'Information Technology', 'Software Engineering', 'Telecommunication',
        'Web Development'
    ];
}

class courses {
    public $year=[
        1=>['Introduction to Programming', 'Mathematics for Computer Science', 'Computer Architecture',
        'Discrete Mathematics', 'Data Structures and Algorithms', 'Introduction to Operating Systems', 
        'Computer Networks Fundamentals', 'Introduction to Database Systems', 'Software Engineering Principles', 
        'Introduction to Cybersecurity', 'Web Development Basics', 'Computer Ethics and Professionalism', 
        'Communication Skills for Computer Scientists', 'Introduction to Artificial Intelligence'],

        2=>['Advanced Programming Concepts', 'Algorithms and Complexity', 'Computer Organization and Assembly Language', 
        'Object-Oriented Programming', 'Database Management Systems', 'Operating Systems and System Programming', 
        'Network Protocols and Communications', 'Web Development Technologies', 'Introduction to Machine Learning', 
        'Software Design and Architecture', 'Cybersecurity Practices', 'Human-Computer Interaction', 
        'Software Testing and Quality Assurance', 'Cloud Computing Fundamentals'],

        3=>['Advanced Data Structures', 'Software Development Methodologies', 'Computer Graphics', 
        'Distributed Systems', 'Artificial Intelligence Fundamentals', 'Mobile Application Development', 
        'Network Security', 'Database Design and Implementation', 'Big Data Analytics', 
        'Embedded Systems', 'Cryptography', 'Internet of Things', 
        'System Analysis and Design', 'Advanced Web Development'],

        4=>['Advanced Algorithms and Optimization', 'Software Project Management', 'High-Performance Computing', 
        'Parallel and Distributed Databases', 'Computer Vision', 'Natural Language Processing', 
        'Cybersecurity Governance and Compliance', 'Advanced Networking', 'Cloud Security', 
        'Software Maintenance and Evolution', 'Data Mining and Warehousing', 'Robotics', 
        'Advanced Web Technologies', 'Computer Ethics in the Digital Age'],

        5 => [
            'Artificial Intelligence' => [
                'Deep Learning', 'Natural Language Processing Applications', 'Reinforcement Learning', 
                'Computer Vision Techniques', 'AI Ethics and Responsible AI'
            ],

            'Computer Engineering' => [
                'VLSI Design', 'Digital Signal Processing', 'Computer Hardware Design', 
                'Embedded System Design', 'FPGA Programming'
            ],

            'Computer Graphics' => [
                'Computer Animation', '3D Graphics Programming', 'Computer Vision for Computer Graphics', 
                'Virtual Reality Systems', 'Advanced Rendering Techniques'
            ],

            'Computer Network' => [
                'Advanced Routing Protocols', 'Network Design and Optimization', 'Network Programming', 
                'Wireless and Mobile Networking', 'Network Security Protocols'
            ],

            'Computer Science' => [
                'Advanced Topics in Algorithms', 'Advanced Compiler Design', 'Advanced Topics in Operating Systems', 
                'Quantum Computing', 'Formal Methods in Computer Science'
            ],

            'Cybersecurity' => [
                'Advanced Cryptography', 'Network Security Protocols and Standards', 'Intrusion Detection and Prevention', 
                'Cybersecurity Risk Management', 'Digital Forensics'
            ],

            'Data Science' => [
                'Machine Learning for Data Science', 'Big Data Analytics', 'Data Visualization and Communication', 
                'Advanced Statistical Methods', 'Natural Language Processing for Data Science'
            ],

            'Game Development' => [
                'Game Design and Development', 'Game Engine Architecture', 'Game Physics and Animation', 
                'Multiplayer Game Development', 'Virtual and Augmented Reality in Games'
            ],

            'Information Systems' => [
                'Enterprise Systems Architecture', 'IT Project Management', 'Business Intelligence and Analytics', 
                'Enterprise Resource Planning Systems', 'Information Systems Security'
            ],

            'Information Technology' => [
                'IT Infrastructure Management', 'Network Design and Implementation', 'Systems Administration', 
                'Cloud Computing Technologies', 'Virtualization and Containerization'
            ],

            'Software Engineering' => [
                'Software Requirements Engineering', 'Software Design Patterns', 'Software Construction and Testing',
                'Software Maintenance and Evolution', 'Agile Software Development'
            ],
            
            'Telecommunication' => [
                'Principles of Telecommunication', 'Digital Communication Systems', 'Wireless Communication',
                'Network Protocols for Telecommunication', 'Telecommunication Switching Systems'
            ],
            
            'Web Development' => [
                'Advanced HTML and CSS', 'JavaScript Frameworks', 'Server-Side Scripting with Node.js',
                'Web Application Security', 'RESTful Web Services'
            ]
    ]
            ];
}


?>


