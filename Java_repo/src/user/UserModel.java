package user;
public class UserModel {
    private String Username;
    private String Password;
    private String Email;
    private String nome;
    private String cognome;


public UserModel(String Username, String Password, String Email, String nome, String cognome) {
    this.Username = Username;
    this.Password = Password;
    this.Email = Email;
    this.nome = nome;
    this.cognome = cognome;
}

    public String getUsername() {
        return this.Username;
    }

    public void setUsername(String Username) {
        this.Username = Username;
    }

    public String getPassword() {
        return this.Password;
    }

    public void setPassword(String Password) {
        this.Password = Password;
    }

    public String getEmail() {
        return this.Email;
    }

    public void setEmail(String Email) {
        this.Email = Email;
    }

    public String getNome() {
        return this.nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getCognome() {
        return this.cognome;
    }

    public void setCognome(String cognome) {
        this.cognome = cognome;
    }
}