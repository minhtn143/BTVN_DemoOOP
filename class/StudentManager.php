<?php


class StudentManager
{
    protected $listStudent = [];
    protected $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function add($student)
    {
        $students = $this->getDataJson();

        $data = [
            "name" => $student->getName(),
            "email" => $student->getEmail(),
            "phone" => $student->getPhone()
        ];

        array_push($students, $data);
        $this->saveDataToFile($students);
    }

    public function getDataJson()
    {
        $dataJson = file_get_contents($this->filePath);
        return json_decode($dataJson);
    }

    public function saveDataToFile($data)
    {
        $dataJson = json_encode($data);
        file_put_contents($this->filePath, $dataJson);
    }

    public function getListStudents()
    {
        $data = $this->getDataJson();
        foreach ($data as $obj) {
            $student = new Student($obj->name, $obj->email, $obj->phone);
            array_push($this->listStudent, $student);
        }
        return $this->listStudent;
    }

    public function getStudentByIndex($index)
    {
        $data = $this->getDataJson();
        return new Student($data[$index]->name, $data[$index]->email, $data[$index]->phone);
    }

    public function updateInfoStudent($index,$newInfo)
    {
        $data = $this->getDataJson();
        $student = [
            "name" => $newInfo->getName(),
            "email" => $newInfo->getEmail(),
            "phone" => $newInfo->getPhone()
        ];
        $data[$index]= $student;
        $this->saveDataToFile($data);
    }

    public function deleteStudent(int $index)
    {
        $data = $this->getDataJson();
        array_splice($data,$index,1,null);
        $this->saveDataToFile($data);
    }
}