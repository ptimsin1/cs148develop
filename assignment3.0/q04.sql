select fldFirstName, fldLastName, fnkSectionId from tblStudents join tblEnrolls on fnkStudentId = pmkStudentId where fnkCourseId = "392" order by fnkSectionId, fldLastName, fldFirstName;
