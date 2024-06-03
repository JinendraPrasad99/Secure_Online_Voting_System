# Online Secure Voting System

This repository contains the source code for an Online Secure Voting System. The system is designed to facilitate secure and efficient voting processes using multiple security methods. The application is built using HTML, CSS, Bootstrap, JavaScript, and PHP.

## Features

- **Secure Data Storage**: Implements AES (Advanced Encryption Standard) to securely store voting data.
- **Multifactor Authentication**: Utilizes a mail server to send OTPs (One-Time Passwords) for secure user logins.
- **Admin Panel**: 
  - Add and manage voters
  - Create and manage ballot papers
  - View voting results and statistics
- **Voter Panel**: 
  - Cast votes securely
  - Receive OTPs for login verification
- **Responsive Design**: Built using Bootstrap to ensure a responsive and user-friendly interface.

## Security Measures

- **AES Encryption**: Ensures that all sensitive data is encrypted before being stored in the database.
- **OTP Verification**: Adds an extra layer of security by sending a one-time password to the user's email during login.

## Technology Stack

- **Frontend**: HTML, CSS, Bootstrap, JavaScript
- **Backend**: PHP
- **Database**: MySQL
- **Email Service**: PHP mailer for sending OTPs

## Installation

1. Clone the repository:
    ```sh
    git clone https://github.com/your-username/online-secure-voting-system.git
    ```
2. Navigate to the project directory:
    ```sh
    cd online-secure-voting-system
    ```
3. Set up the database:
    - Import the `database.sql` file into your MySQL database.
4. Configure the mail server:
    - Update the mail server settings in the `config.php` file with your email server details.
5. Start the server:
    - Use a local server environment like XAMPP or WAMP to run the application.

## Usage

### Admin Panel
- Log in with admin credentials.
- Add new voters and create ballot papers.
- Monitor and manage the voting process.
- View results and analytics.

### Voter Panel
- Register or log in using the OTP verification process.
- View available ballots and cast votes securely.

## Screenshots
-Admin Login Panel
![1](https://github.com/JinendraPrasad99/Secure_Online_Voting_System/assets/99186783/027b2818-69f7-470c-8988-7ed5e91e3d9e)

-Admin Dashboard Panel
![2](https://github.com/JinendraPrasad99/Secure_Online_Voting_System/assets/99186783/c6350640-9fb0-4fbc-9f74-7ddfd4d278e4)

-Adding Voters
![5](https://github.com/JinendraPrasad99/Secure_Online_Voting_System/assets/99186783/5025feec-1434-4cea-933e-4e39ec554d69)

-OTP System
![9](https://github.com/JinendraPrasad99/Secure_Online_Voting_System/assets/99186783/7b5e9c48-3d87-45d6-af37-b1912b57ca16)

![10](https://github.com/JinendraPrasad99/Secure_Online_Voting_System/assets/99186783/614dc67f-a0ff-48ce-8db3-b3e02ca995b8)



## Contributing

Contributions are welcome! Please fork this repository and submit a pull request for any improvements or bug fixes.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Contact

For any questions or feedback, please contact:
- **Name**: [P.K Jinendra Prasad - IT21266478]
- **Email**: [it21266478@my.sliit.lk]

- **Name**: [K.S.R Jayasekara - IT21109508]
- **Email**: [it21109508@my.sliit.lk]


---

Thank you for using the Online Secure Voting System. Your participation in maintaining the integrity of the voting process is highly appreciated!
