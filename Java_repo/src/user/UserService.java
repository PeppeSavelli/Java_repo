package user;
public class UserService{

    public UserModel registerUser(String Username, String Password, String Email, String nome, String cognome){
        UserModel user = new UserModel(Username, Password, Email, nome, cognome);
        return user;
    }
    public UserModel loginUser(String Username, String Password){
        UserModel user = new UserModel(Username, Password, null, null, null);
        return user;
    }

    public static void main(String[] args) {
        UserService userService = new UserService();
        UserModel[] users  = new UserModel[10];

        users[0] = userService.registerUser("Username", "Password", "Email", "nome", "cognome");
        users[1] = userService.registerUser("Username", "Password", "Email", "nome", "cognome");
        for (UserModel user : users) {
            System.out.println(user.getUsername() + ", " + user.getPassword() + ", " + user.getEmail() + ", " + user.getNome() + ", " + user.getCognome());
        }

        users[0] = userService.loginUser("Username", "Password");
        users[1] = userService.loginUser("Username", "Password");

        try{
            if(users[0].getUsername().equals("Username") && users[0].getPassword().equals("Password")){
                System.out.println("Login successful");
            }else{
                System.out.println("Login failed");
            }

        }catch (NullPointerException e){
            System.out.println("Login failed");
        }
    }
}