select pmkCourseId from tblCourses where ((select count(*) from tblSections where pmkCourseId = fnkCourseId) >= 50); 
