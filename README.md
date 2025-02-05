# The Beta Club

![The Beta Club Logo](https://.com)

**The Beta Club** is a Laravel-based web application designed for climbers in Guadalajara, Mexico. It provides a platform to explore, register, and share climbing routes, fostering a strong and connected climbing community.

## Features 🚀
- 📍 **Interactive Route Map** – Browse and discover climbing spots in Guadalajara.
- 🏔 **Route Registration** – Users can submit new climbing routes with details such as difficulty, type, and location.
- 📊 **Route Statistics** – Track ascents, user feedback, and climbing trends.
- 👥 **Community Engagement** – Climbers can share beta, comment, and rate routes.
- 🔐 **User Authentication** – Secure login and profile management.
- 📅 **Events & Meetups** – Stay updated on local climbing events and competitions.

## Tech Stack 🛠️
- **Backend**: Laravel
- **Frontend**: Blade, TailwindCSS
- **Database**: MySQL
- **Authentication**: Laravel Breeze / Sanctum
- **Maps & Geolocation**: Leaflet.js / Google Maps API
- **Hosting**: DigitalOcean / Heroku

## Installation ⚙️

1. Clone the repository:
   ```sh
   git clone https://github.com/yourusername/the-beta-club.git
   cd the-beta-club
   ```
2. Install dependencies:
   ```sh
   composer install
   npm install && npm run dev
   ```
3. Set up environment variables:
   ```sh
   cp .env.example .env
   php artisan key:generate
   ```
4. Configure database and run migrations:
   ```sh
   php artisan migrate --seed
   ```
5. Start the development server:
   ```sh
   php artisan serve
   ```

## API Endpoints 🌐
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/routes` | Get all climbing routes |
| POST | `/routes` | Create a new route |
| GET | `/routes/{id}` | Get route details |
| PUT | `/routes/{id}` | Update route information |
| DELETE | `/routes/{id}` | Delete a route |

## Contributing 🤝
We welcome contributions! Please follow these steps:
1. Fork the repository
2. Create a feature branch (`git checkout -b feature-name`)
3. Commit your changes (`git commit -m 'Added new feature'`)
4. Push to the branch (`git push origin feature-name`)
5. Open a pull request

## License 📜
This project is open-source and available under the [MIT License](LICENSE).

## Contact 📬
- **Creator:** Patricio
- **Email:** blancop296@gmail.com
- **GitHub:** [yourusername](https://github.com/PatWhite29)
- **Website:** [thebetaclub.com](https://thebetaclub.com)

Happy Climbing! 🧗‍♂️🔥
