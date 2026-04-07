# 🤖 xCHAMi MD V3.5 - Elite Edition
> Next-Generation WhatsApp AI Bot with iOS Style Web Dashboard.

<p align="center">
  <img src="https://img.shields.io/github/stars/xCHAMiSTUDIO/xCHAMi-MD?style=for-the-badge&color=007AFF&logo=github" alt="Stars">
  <img src="https://img.shields.io/github/forks/xCHAMiSTUDIO/xCHAMi-MD?style=for-the-badge&color=007AFF&logo=github-sponsors" alt="Forks">
  <img src="https://img.shields.io/badge/Node.js-20+-007AFF?style=for-the-badge&logo=node.js" alt="Node Version">
</p>

---

## 🚀 Full Setup Guide (Step-by-Step)

### 1️⃣ Step 1: Get Telegram Credentials
බොට්ව Remote Control කිරීමට අවශ්‍ය තොරතුරු ලබාගන්න:
* **Bot Token:** [@BotFather](https://t.me/BotFather) වෙත ගොස් අලුත් බොට් කෙනෙක් සාදා `API Token` එක ලබාගන්න.
* **Chat ID:** [@userinfobot](https://t.me/userinfobot) වෙත මැසේජ් එකක් දමා ඔයාගේ `Unique Chat ID` එක ලබාගන්න.

### 2️⃣ Step 2: InfinityFree Web Dashboard Setup
ඔයාගේ Web Panel එක ලෝකයට විවෘත කරන්න:
1.  **Account:** [InfinityFree](https://www.infinityfree.com/) හි ගිණුමක් සාදා අලුත් Hosting Account එකක් සාදන්න.
2.  **MySQL:** Control Panel එකේ **MySQL Databases** වෙත ගොස් අලුත් Database එකක් සාදන්න.
3.  **Database Table:** `phpMyAdmin` විවෘත කර පහත SQL එක Run කරන්න:
    ```sql
    CREATE TABLE bot_settings (
      id INT PRIMARY KEY,
      bot_status VARCHAR(10),
      system_prompt TEXT,
      ai_model VARCHAR(100),
      total_messages INT DEFAULT 0
    );
    INSERT INTO bot_settings (id, bot_status, system_prompt, ai_model) 
    VALUES (1, 'ON', 'You are xCHAMi MD AI.', 'llama-3.3-70b-versatile');
    ```
4.  **Upload Files:** `htdocs` ෆෝල්ඩරය තුළට `index.php`, `api.php`, `update_settings.php` සහ `db.php` අප්ලෝඩ් කරන්න.
5.  **Config:** `db.php` ෆයිල් එකේ ඔයාගේ MySQL Host, User සහ Password නිවැරදිව ඇතුළත් කරන්න.

### 3️⃣ Step 3: GitHub Secret Configuration
ඔයාගේ API Keys ආරක්ෂිතව තබා ගැනීමට:
1.  ඔයාගේ GitHub Repo එකේ **Settings > Secrets and variables > Actions** වෙත යන්න.
2.  **New repository secret** ක්ලික් කර පහත ඒවා ඇතුළත් කරන්න:
    * `GROQ_API_KEY`: (Groq Cloud වෙතින් ලබාගත් Key එක)
    

### 4️⃣ Step 4: Deployment
1.  ඔයාගේ සියලුම කේතයන් (index.js, package.json, etc.) Repo එකට Push කරන්න.
2.  GitHub Actions මගින් බොට් ස්වයංක්‍රීයව පණගැන්වෙනු ඇත.
3.  ටෙලිග්‍රෑම් එකට ලැබෙන **QR Code** එක Scan කර බොට්ව WhatsApp සමඟ සම්බන්ධ කරන්න.

---

## 🎨 iOS Style Command Center
ඔයාගේ Dashboard එක හරහා මේ දේවල් කළ හැකියි:
* ✅ බොට්ව ON/OFF කිරීම.
* ✅ AI Models මාරු කිරීම (Llama 3.3, etc.).
* ✅ System Prompt එක එසැණින් වෙනස් කිරීම.
* ✅ දෛනික මැසේජ් ප්‍රමාණය නිරීක්ෂණය කිරීම.

---

## 🛠️ Tech Stack
* **Backend:** Node.js, Baileys
* **AI Engine:** Groq Cloud (Llama 3.3)
* **Frontend:** PHP, Tailwind CSS (iOS Theme)
* **Database:** MySQL

---

## 👨‍💻 Developer Information
**Developed with ❤️ by xCHAMi STUDIO**

* **Lead Developer:** Chamidu Harshana
* **Brand:** xCHAMi STUDIO
* **Project:** xCHAMi MD V3.5
* **Contact:** [Telegram](https://t.me/xCHAMi_STUDIO)

> "Innovation starts here." - xCHAMi STUDIO

---
Copyright © 2026 xCHAMi STUDIO. All rights reserved.
