# 🤖 xCHAMi MD V3.5 - Elite Edition
> **Next-Generation WhatsApp AI Bot with iOS Style Glassmorphism Dashboard.**

<p align="center">
  <img src="https://img.shields.io/github/stars/xCHAMiSTUDIO/xCHAMi-MD?style=for-the-badge&color=007AFF&logo=github" alt="Stars">
  <img src="https://img.shields.io/github/forks/xCHAMiSTUDIO/xCHAMi-MD?style=for-the-badge&color=007AFF&logo=github-sponsors" alt="Forks">
  <img src="https://img.shields.io/badge/Node.js-20+-007AFF?style=for-the-badge&logo=node.js" alt="Node Version">
</p>

---

## 🚀 Full Setup Guide (Step-by-Step)

### 1️⃣ Step 1: Get AI API Key (Groq Cloud)
බොට්ගේ බුද්ධිය ක්‍රියාත්මක කිරීමට අවශ්‍ය API Key එක ලබාගන්න:
1.  [Groq Cloud Console](https://console.groq.com/keys) වෙත යන්න.
2.  ගිණුමක් සාදා **Create API Key** ක්ලික් කර ලැබෙන Key එක සුරැකිකව තබාගන්න.

### 2️⃣ Step 2: Get Telegram Credentials
බොට්ව Remote Control කිරීමට අවශ්‍ය තොරතුරු ලබාගන්න:
* **Bot Token:** [@BotFather](https://t.me/BotFather) වෙත ගොස් අලුත් බොට් කෙනෙක් සාදා `API Token` එක ලබාගන්න.
* **Chat ID:** [@userinfobot](https://t.me/userinfobot) වෙත මැසේජ් එකක් දමා ඔයාගේ `Unique Chat ID` එක ලබාගන්න.

### 3️⃣ Step 3: InfinityFree Web Dashboard Setup
ඔයාගේ Web Panel එක Host කරන්න:
1.  [InfinityFree](https://www.infinityfree.com/) හි ගිණුමක් සාදා අලුත් MySQL Database එකක් සාදන්න.
2.  **phpMyAdmin** විවෘත කර පහත SQL කේතය Run කරන්න:

[--- මෙතැනට ඔයාගේ SQL CODE එක දාන්න ---]

3.  `htdocs` තුළට `index.php`, `api.php`, `update_settings.php` සහ `db.php` අප්ලෝඩ් කර `db.php` සැකසුම් නිවැරදි කරන්න.

### 4️⃣ Step 4: GitHub Secret Configuration
API Keys ආරක්ෂිතව තබා ගැනීමට **Settings > Secrets and variables > Actions** වෙත ගොස් මේවා එක් කරන්න:
* `GROQ_API_KEY`: (Step 1 හි ලබාගත් Key එක)
* `TELEGRAM_TOKEN`: (Step 2 හි ලබාගත් Token එක)
* `MY_CHAT_ID`: (Step 2 හි ලබාගත් ID එක)

### 5️⃣ Step 5: Deployment (GitHub Actions)
බොට් එක 24/7 ක්‍රියාත්මක වීමට `.github/workflows/main.yml` ලෙස පහත කේතය භාවිතා කරන්න:

[--- මෙතැනට ඔයාගේ YAML CODE එක දාන්න ---]

---

## 🎨 iOS Style Command Center
* ✅ බොට්ව ON/OFF කිරීම.
* ✅ AI Models මාරු කිරීම (Llama 3.3, etc.).
* ✅ System Prompt එක එසැණින් වෙනස් කිරීම.

---

## 👨‍💻 Developer Information
**Developed with ❤️ by xCHAMi STUDIO**

* **Lead Developer:** Chamidu Harshana
* **Brand:** xCHAMi STUDIO
* **Institution:** Sripalee College, Horana
* **Grade:** 12 (Mathematics Stream)
* **Contact:** [Telegram](https://t.me/xCHAMi_STUDIO)

---
Copyright © 2026 xCHAMi STUDIO. All rights reserved.
