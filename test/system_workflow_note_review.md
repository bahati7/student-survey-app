# System Testing, Deployment & Data Population Report

## 1. Executive Summary

This document outlines the findings from testing the system’s workflow, including:

- Admin configuration  
- Student interaction  
- Instructor dashboard behavior  
- System routing and navigation flow  

The system demonstrates strong foundational logic and a clear separation of user roles. However, critical routing and session-handling issues were identified in the instructor flow that require attention.

## 2. Admin Setup & Configuration

The testing process began with creating an **Admin account** and configuring the system:

- Admin account successfully created  
- Pages created without errors  
- Questions populated correctly  
- Survey structure logically organized  

### ✅ What Works Well

- Admin workflow is intuitive and functional  
- Page creation and question population behave as expected  
- Role separation between Admin and Student works properly  
- Surveys created by Admin are visible to Students  

The system architecture reflects thoughtful planning and logical design.

## 3. Student Role Testing

After logging out of the Admin account, the system was tested from the **Student perspective**.

![Register as a student](test/previousSurvey/2026-02-22_17-42-56.png)

The student dashboard displayed:

- All Surveys  
- Access to Questions  
- My Completed Surveys  

This confirms that role-based visibility and access control are functioning properly.

### Accessed "All Surveys"

![Welcome New Student](test/previousSurvey/2026-02-22_18-07-13.png)

This view confirms that surveys created by the Admin are correctly accessible to students.

![Access all surveys](test/previousSurvey/2026-02-22_18-07-45.png)

**Suggested Action for Reviewers:**

Log in as a student and verify:

- Survey visibility  
- Page responsiveness  
- Question rendering accuracy  

### Access Questions

![See all the questions](test/previousSurvey/2026-02-22_18-09-23.png)

The question board loads properly. However, a structural issue was identified.

### UX Issue – Question Input Type

Some questions are configured as **multiple choice (checkboxes)**.

![Multi-choice vs radio logic](test/previousSurvey/MultipleQuestionsVsRadio.png)

#### Problem

Certain questions logically require only one answer, yet the system allows multiple selections (double ticks).

This may lead to:

- Logical inconsistencies  
- Invalid answer combinations  
- Potential grading inaccuracies  
- Reduced data integrity  

#### Recommended Improvement

Questions that require a single correct answer should use:

- **Radio buttons** instead of checkboxes  

This will:

- Enforce logical selection  
- Improve user experience  
- Maintain answer integrity  
- Prevent ambiguous submissions  

This adjustment should be implemented at the question configuration level.

### Completed Surveys Section

The **"My Completed Surveys"** feature was tested.

### ✅ What Works Well

- Completed surveys are accessible  
- Survey completion tracking works correctly  
- Student dashboard is stable  

The student area is well-developed and reliable.

## 4. Instructor Dashboard – System Flow Breakdown

Testing continued by logging in as an **Instructor**.  
This is where major system flow issues were discovered.

### First Instructor Attempt – Mislinked Information

![Mislink information](test/previousSurvey/2026-02-22_18-35-25.png)

On the first attempt, the instructor login resulted in:

- Incorrect routing  
- Mislinked information  
- Unexpected redirection  

This suggests a routing or session-handling issue.

### System Restart Behavior

After closing the browser and reopening `index.php` from VS Code:

- The instructor dashboard loaded successfully  

However, this indicates that the system only behaves correctly after manual restart.

⚠️ **Concern:** This is a serious issue for production environments.

### Major Issue – Instructor Routing Misbehavior

Scenario observed:

- Instructor logs in with correct credentials  
- System redirects to an incorrect link  
- Restarting the system temporarily resolves the issue  

This may indicate:

- Broken redirect logic  
- Improper session persistence  
- Incorrect route referencing  
- Hardcoded path dependencies  

### After Restart – Dashboard Access Issue

![Instructor dashboard](test/previousSurvey/2026-02-22_18-35-27.png)

Even after successful login:

- Clicking **Instructor → Dashboard** may fail  
- Navigation may not resolve properly  

This demonstrates instability in the navigation flow.

### Attention Required – System Flow Integrity

The instructor routing issue affects:

- System reliability  
- User trust  
- Deployment readiness  
- Production stability  

If deployed publicly in this state, users may:

- Experience dashboard failures  
- Be redirected incorrectly  
- Assume login credentials are invalid  
- Lose confidence in the system  

## 5. Recommendations

### Immediate Technical Actions

1. Audit instructor route definitions  
2. Verify session persistence after login  
3. Replace hardcoded paths with dynamic base URLs  
4. Test login flow without restarting the server  
5. Validate redirect headers and navigation logic  

### UX Improvements

- Review all question types  
- Replace inappropriate checkboxes with radio buttons  
- Add validation rules for single-answer logic  

## 6. Overall Assessment

### Strengths

- Strong role-based structure  
- Functional Admin configuration  
- Stable Student workflow  
- Proper survey visibility  

### Areas for Improvement

- Instructor routing instability  
- Session management inconsistency  
- Navigation reliability  

## Final Note

The system shows strong architectural thinking and clear functional design.  
However, routing and session-handling issues must be resolved before production deployment.

🔴 **Priority:** The instructor dashboard issue should be addressed as soon as possible.

**Reviewers are encouraged to:**

- Replicate the instructor login process  
- Test navigation thoroughly  
- Attempt login without restarting the system  
- Inspect route references and session handling  

✅ **Conclusion:** The system is promising — refinement will ensure stability and scalability.

---

**Prepared by:**  
Efatha Rutakaza  
System Testing & Flow Analysis