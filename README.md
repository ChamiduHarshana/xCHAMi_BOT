# xCHAMi_BOT
# 🤖 xCHAMi MD V3.5 - Elite Edition
> Next-Gen WhatsApp AI Bot powered by Groq & Baileys with a Professional Web Dashboard.

<p align="center">
  <img src="https://img.shields.io/github/stars/xCHAMiSTUDIO/xCHAMi-MD?style=for-the-badge&color=007AFF&logo=github" alt="Stars">
  <img src="https://img.shields.io/github/forks/xCHAMiSTUDIO/xCHAMi-MD?style=for-the-badge&color=007AFF&logo=github-sponsors" alt="Forks">
  <img src="https://img.shields.io/badge/Node.js-20+-007AFF?style=for-the-badge&logo=node.js" alt="Node Version">
  <img src="https://img.shields.io/badge/Status-Active-brightgreen?style=for-the-badge" alt="Status">
</p>

---

## 💎 Premium Features
* **⚡ Ultra-Fast Responses:** Powered by Groq Cloud (Llama 3.3).
* **📱 iOS Style Dashboard:** Professional PHP web panel to control your bot.
* **🎭 Multi-Personality:** Change bot behavior via the web or Telegram.
* **📊 Live Monitoring:** Track total messages and system uptime in real-time.
* **🔒 Secure:** API keys are managed via GitHub Secrets for maximum safety.

---

## 🛠️ Setup & Deployment

### 1. Web Dashboard (PHP & MySQL)
ඔයාගේ Web Panel එක (InfinityFree හෝ වෙනත්) Host කරන ආකාරය:
1.  `db.php` එකේ ඔයාගේ Database තොරතුරු ඇතුළත් කරන්න.
2.  `index.php`, `api.php`, `update_settings.php` යන ෆයිල් සියල්ල upload කරන්න.
3.  Database එකේ `bot_settings` නමින් table එකක් සාදා record එකක් ඇතුළත් කරන්න.

### 2. GitHub Actions Deployment (YAML)
බොට්ව 24/7 run කිරීමට `.github/workflows/main.yml` ෆයිල් එකක් සාදා පහත දේ එක් කරන්න:

```yaml
name: xCHAMi MD Bot
on:
  push:
    branches: [ main ]
  schedule:
    - cron: '0 */6 * * *'

jobs:
  build:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v3
      - name: Use Node.js
        uses: actions/setup-node@v3
        with:
          node-version: '20'
      - run: npm install
      - run: node index.js
        env:
          GROQ_API_KEY: ${{ secrets.GROQ_API_KEY }}

