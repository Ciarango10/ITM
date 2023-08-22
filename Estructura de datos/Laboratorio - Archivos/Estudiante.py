class Estudiante():
    def __init__(self, Documento, Carne, Apellidos, Nombres, Telefono, Email, Fecha_Nacimiento):
        self.__Documento=Documento
        self.__Carne=Carne
        self.__Apellidos=Apellidos
        self.__Nombres=Nombres
        self.__Telefono=Telefono
        self.__Email=Email
        self.__Fecha_Nacimiento=Fecha_Nacimiento

    @property
    def Documento(self):
        return self.__Documento

    @Documento.setter
    def Documento(self,Documento):
        self.__Documento=Documento

    @property
    def Carne(self):
        return self.__Carne

    @Carne.setter
    def Carne(self,Carne):
        self.__Carne=Carne

    @property
    def Apellidos(self):
        return self.__Apellidos

    @Apellidos.setter
    def Apellidos(self,Apellidos):
        self.__Apellidos=Apellidos

    @property
    def Nombres(self):
        return self.__Nombres

    @Nombres.setter
    def Nombres(self,Nombres):
        self.__Nombres=Nombres

    @property
    def Telefono(self):
        return self.__Telefono

    @Telefono.setter
    def Telefono(self,Telefono):
        self.__Telefono=Telefono

    @property
    def Email(self):
        return self.__Email

    @Email.setter
    def Email(self,Email):
        self.__Email=Email

    @property
    def Fecha_Nacimiento(self):
        return self.__Fecha_Nacimiento

    @Fecha_Nacimiento.setter
    def Fecha_Nacimiento(self,Fecha_Nacimiento):
        self.__Fecha_Nacimiento=Fecha_Nacimiento

    def __str__(self):
        return self.Documento+' '+self.Carne+' '+self.Apellidos+' '+self.Nombres+' '+self.Telefono+' '+self.Email+' '+str(self.Fecha_Nacimiento)

