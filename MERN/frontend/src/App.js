import "./App.css";
import { BrowserRouter, Route, Routes } from "react-router-dom";
import AdminDashboardPage from "./pages/admin/AdminDashboardPage";
import RegisterPage from "./pages/RegisterPage";
import LoginPage from "./pages/LoginPage";
import HomePage from "./pages/HomePage";
import NoPage from "./pages/NoPage";
import StudentDashboardPage from "./pages/student/StudentDashboardPage";
import AdminUsersPage from "./pages/admin/AdminUsersPage";
import AddLibrarianPage from "./pages/AddLibrarianPage";
import ListLibrariansPage from "./pages/ListLibrariansPage";
// import Footer from './layout/Footer';
// import Header from './layout/Header';
import AddStudentPage from "./pages/AddStudentPage";
import ListStudentsPage from "./pages/ListStudentsPage";
import LibrarianDashboardPage from "./pages/LibrarianDashboardPage";
import AddBookPage from "./pages/AddBookPage";
import BooksPage from "./pages/BooksPage";
import IssueBookPage from "./pages/IssueBookPage";
import ReturnBookPage from "./pages/ReturnBookPage";
import IssuedBooksPage from "./pages/IssuedBooksPage";
import BooksHistoryPage from "./pages/BooksHistoryPage";
import EditBookPage from "./pages/EditBookPage";
import EditUserPage from "./pages/EditUserPage";
import StudentIssuedBooks from "./pages/student/StudentIssuedBooks";


function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<HomePage />}/>
        <Route path="/register" element={<RegisterPage />}/>
        <Route path="/login" element={<LoginPage />}/>
        <Route path="/admin-dashboard" element={<AdminDashboardPage />}/>
        <Route path="/student-dashboard" element={<StudentDashboardPage />}/>
        <Route path="/librarian-dashboard" element={<LibrarianDashboardPage />}/>
        <Route path="/admin-users" element={<AdminUsersPage />}/>
        <Route path="/add-librarian" element={<AddLibrarianPage />}/>
        <Route path="/librarians" element={<ListLibrariansPage />}/>
        <Route path="/add-student" element={<AddStudentPage />}/>
        <Route path="/students" element={<ListStudentsPage />}/>
        <Route path="/add-book" element={<AddBookPage />}/>
        <Route path="/books" element={<BooksPage />}/>
        <Route path="/issue-book" element={<IssueBookPage />}/>
        <Route path="/return-book" element={<ReturnBookPage />}/>
        <Route path="/issued-books" element={<IssuedBooksPage />}/>
        <Route path="/books-history" element={<BooksHistoryPage />}/>
        <Route path="/edit-book/:id" element={<EditBookPage />}/>
        <Route path="/edit-user/:id" element={<EditUserPage />}/>
        <Route path="/student-issues" element={<StudentIssuedBooks />}/>


        <Route path="/*" element={<NoPage />} />
      </Routes>
    </BrowserRouter>
  );
}

export default App;
