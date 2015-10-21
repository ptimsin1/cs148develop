select distinct fldCourseName from tblCourses join tblEnrolls on pmkCourseId = fnkCourseId where fldGrade = 100 order by fldCourseName;


