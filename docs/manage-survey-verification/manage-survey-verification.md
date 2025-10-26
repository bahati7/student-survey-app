# Manage Survey Verification Report

**Repository:** student-survey-app  
**Related Issue:** Verification and Documentation for "Manage Survey" Use Case #39  
**Use Case Reference:** UC-Manage-Survey

---

## 1. Objective

This issue focuses on verifying and documenting the implementation of the **“Manage Survey”** use case within the **student-survey-app** project.

It aims to validate:

- The **creation**, **modification**, and **deletion** of Surveys and Questions;
- The **linking logic** between Surveys and their associated Questions;
- The **role-based permissions** and interactions of **Instructor** and **Administrator**;
- The conformity of the system’s behavior to the workflow defined in the _Manage Survey_ use case.

The ultimate goal is to provide a clear and complete overview of the Survey Management lifecycle, confirming that each feature aligns with the intended user experience and functional requirements.

---

## 2. Verification Environment

| Parameter             | Details                    |
| --------------------- | -------------------------- |
| **WordPress Version** | 6.8.2                      |
| **Theme**             | Student Survey Child Theme |
| **Roles Tested**      | Instructor, Administrator  |

---

## 3. Verification Steps and Results

### 3.1 Survey Creation (Instructor)

**Steps:**

1. **Login as Instructor**

   - Navigate to the login page.
   - Enter valid credentials and click **Login**.

   ![Instructor Login 1](Instructorscreensshoot/screenshootlogin_1.png)  
   ![Instructor Login 2](Instructorscreensshoot/screenshootlogin_2.png)

2. **Access the Instructor Dashboard**  
   The user is redirected to the Instructor Dashboard upon successful login.

   ![Instructor Dashboard](Instructorscreensshoot/screenshootdashboard_1.png)

3. **Navigate to Surveys → Add New Survey**  
   From the left menu, click **student-survey-app**, then **Surveys**.

   ![Dashboard Navigation](Instructorscreensshoot/screenshootdashboard.png)
   ![Survey List](Instructorscreensshoot/Survey.png)

   Next, click **Add New Survey** to create a new entry.  
   ![Add New Survey](Instructorscreensshoot/Addnewsurvey.png)

4. **Enter Survey Details and Publish**

   - Enter the **Survey Title**, e.g., _Student Feedback Survey_ (yellow section).
   - Add a **description** (blue section).
   - Click **Publish** (red section).

   ![Publish Survey](Instructorscreensshoot/publishesurvey.png)

**Result:**  
The survey is successfully created and appears under **All Surveys**.  
To verify, click on **All Surveys** (yellow). You should see the new survey highlighted in blue.

![Published Survey](Instructorscreensshoot/publishedsurvey.png)

---

### 3.2 Question Creation and Linking to Survey (Instructor)

**Steps:**

1. **Stay logged in as Instructor.**
2. Click **Questions**, then **Add New Question** (highlighted in yellow).

   ![Add and Link Question](Instructorscreensshoot/Adandlinkquestion.png)

3. **Enter Question Details:**

   - Add the question in the **Add title** field, e.g., _How satisfied are you with the course?_ (yellow highlight).  
     ![Add Question](Instructorscreensshoot/Addquestion.png)

   - In the **Select a Survey** dropdown (yellow), choose the previously created survey (_Student Feedback Survey_), as shown in blue.  
     ![Select Survey](Instructorscreensshoot/selectsurvey.png)

4. **Set Question Type and Options:**

   - Click **Question Type**, then select **Multiple Choice**.  
     ![Question Type](Instructorscreensshoot/questiontype.png)

   - In the **Answer Options** field, add:
     - A. Very satisfied
     - B. Satisfied
     - C. Less satisfied
     - D. Not satisfied  
       ![Answer Options](Instructorscreensshoot/answeroptions.png)

5. **Finalize:**
   - Check **Required Question** (yellow).
   - Click **Publish** (blue).  
     ![Publish Question](Instructorscreensshoot/checkboxpublish.png)

**Result:**  
The question is successfully created and linked to the selected survey.  
To verify, click **All Surveys** , it should appear at the top of the list with details.

![Survey List](Instructorscreensshoot/installsurvey.png)  
![Question Result](Instructorscreensshoot/quesstionresult.png)

---

### 3.3 Editing Survey (Administrator)

**Purpose:**  
Ensure that administrators can update any survey created by instructors while preserving data integrity and linked questions.

**Steps:**

1. **Login as Administrator.**
2. Go to **Dashboard → Surveys → All Surveys.**  
   ![All Surveys (Admin)](adminscreensshoot/allsurvey.png)

   The list shows all existing surveys, including _Student Feedback Survey_ created by the instructor.  
   ![Survey Interface](adminscreensshoot/interfaceallsurvey.png)

3. Click **Edit** on the _Student Feedback Survey_.  
   As shown in the screenshot below, the admin is editing the survey.  
   ![Instructor Interface](adminscreensshoot/instructorinterface.png)

4. Update the **Survey Description**, e.g., “This Survey is updated by the administrator.”  
   Optionally, modify the closing date and click **Update**.  
   ![Comments](adminscreensshoot/comments.png)  
   ![Update](adminscreensshoot/update.png)

**Result:**  
Survey successfully updated. The modification is visible in the student interface during survey completion.

![Result](adminscreensshoot/result.png)

---

### 3.4 Editing Question (Instructor)

**Steps:**

1. **Login as Instructor.**
2. Navigate to **Dashboard → Questions → All Questions.**  
   ![Questions List](Instructorscreensshoot/installsurvey.png)  
   ![Instructor Question Interface](Instructorscreensshoot/instinterfaceallsurvey.png)

3. Click **Edit** on an existing question.  
   ![Edit Question](Instructorscreensshoot/editquestion.png)

4. Change the **Question Type**, e.g., from _Multiple Choice_ to _Time_.  
   ![Multiple Choice](Instructorscreensshoot/multiplechoise.png)  
   ![Time Type](Instructorscreensshoot/time.png)

5. Click **Update** to save changes.  
   ![Update Question](Instructorscreensshoot/qupdate.png)

**Result:**  
Question successfully updated. The changes are visible in the student interface.  
![Updated Question Result](Instructorscreensshoot/qresult.png)

---

### 3.5 Deletion (Instructor and Administrator)


