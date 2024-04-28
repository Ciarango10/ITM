using Microsoft.AspNetCore.Identity;
using Microsoft.EntityFrameworkCore;
using Veterinary.API.Data;
using Veterinary.API.Helpers;
using Veterinary.Shared.Entities;

var builder = WebApplication.CreateBuilder(args);

// Add services to the container.

builder.Services.AddControllers();
// Learn more about configuring Swagger/OpenAPI at https://aka.ms/aspnetcore/swashbuckle
builder.Services.AddEndpointsApiExplorer();

builder.Services.AddIdentity<User, IdentityRole>(x =>
{
    x.User.RequireUniqueEmail = true;
    x.Password.RequireDigit = false;
    x.Password.RequiredUniqueChars = 0;
    x.Password.RequireUppercase = true;
    x.Password.RequireLowercase = true;
    x.Password.RequireNonAlphanumeric = false;
})
.AddEntityFrameworkStores<DataContext>()
.AddDefaultTokenProviders();

builder.Services.AddScoped<IUserHelper, UserHelper>();
builder.Services.AddSwaggerGen();

builder.Services.AddDbContext<DataContext>(x => x.UseSqlServer("name=DefaultConnection"));

var app = builder.Build();

// Configure the HTTP request pipeline.
if (app.Environment.IsDevelopment())
{
    app.UseSwagger();
    app.UseSwaggerUI();
}

app.UseHttpsRedirection();

app.UseAuthentication();

app.UseAuthorization();

app.MapControllers();

app.UseCors(x => x.AllowAnyMethod().AllowAnyHeader().AllowCredentials().SetIsOriginAllowed(origin => true));

app.Run();
