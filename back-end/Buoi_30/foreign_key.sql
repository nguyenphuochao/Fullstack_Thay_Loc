ALTER TABLE `register`
    ADD CONSTRAINT `student_subject_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`),
    ADD CONSTRAINT `student_subject_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`);

=> Mục tiêu của tạo khóa ngoại giúp đồng quán dữ liệu giữa các bảng, giúp việc thao tác dữ liệu dễ dàng hơn, tránh việc dữ liệu bị mất mát, không nhất quán.