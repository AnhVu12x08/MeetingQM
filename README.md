
# MeetingQM - Social Engineering Tool

**MeetingQM** is a lightweight, proof-of-concept social engineering tool designed to simulate an online meeting environment. It leverages **Cloudflare Tunnels** to expose a local PHP server to the internet securely and stealthily, without requiring manual port forwarding.

The tool hosts a realistic "Online Meeting" landing page (styled with Bootstrap 5) to test user awareness regarding camera permissions and device fingerprinting.

> **⚠️ DISCLAIMER:** This tool is for **EDUCATIONAL PURPOSES** and **AUTHORIZED SECURITY TESTING** only. The developer assumes no liability and is not responsible for any misuse or damage caused by this program. Do not use this tool on targets without prior mutual consent.

---

## 🚀 Features

* **Realistic UI:** Features a modern, responsive "Online Meeting" interface (similar to Zoom/Google Meet) built with Bootstrap 5.
* **Cloudflare Tunnel Integration:** Uses `cloudflared` to generate secure HTTPS links (`trycloudflare.com`) automatically, bypassing NAT/Firewalls without port forwarding.
* **Cam Capture:** Automatically requests camera permissions and captures images from the target's webcam every 1.5 seconds.
* **Advanced Device Fingerprinting:** Collects detailed device information via JavaScript and PHP:
    * Public IP Address & Timezone.
    * Operating System & Browser User Agent.
    * Screen Resolution.
    * CPU Cores & Estimated RAM.
* **Organized Storage:** Automatically saves captured images into a dedicated `captures/` directory and logs data to text files.

---

## 📂 Directory Structure

```text
MEETINGQM/
├── captures/              # Stores captured webcam images (.png)
├── ip.php                 # Backend to process IP and Device Info (JSON)
├── metting.sh             # Main executable script (Bash)
├── OnlineMeeting.html     # The frontend HTML/JS template (Master file)
├── post.php               # Backend to process and save Base64 image data
└── saved.ip.txt           # Log file containing victim IPs
````

-----

## 🛠️ Installation & Setup

### 1\. Install Dependencies & Cloudflared

You must install PHP and add the official Cloudflare repository to your system to get the latest version of `cloudflared`.

**Run the following commands in your terminal (Kali Linux/Ubuntu):**

```bash
# 1. Update and install PHP/Standard tools
sudo apt update
sudo apt install php curl wget -y

# 2. Add Cloudflare GPG key
sudo mkdir -p --mode=0755 /usr/share/keyrings
curl -fsSL [https://pkg.cloudflare.com/cloudflare-public-v2.gpg](https://pkg.cloudflare.com/cloudflare-public-v2.gpg) | sudo tee /usr/share/keyrings/cloudflare-public-v2.gpg >/dev/null

# 3. Add the Cloudflare repo to your apt sources
echo 'deb [signed-by=/usr/share/keyrings/cloudflare-public-v2.gpg] [https://pkg.cloudflare.com/cloudflared](https://pkg.cloudflare.com/cloudflared) any main' | sudo tee /etc/apt/sources.list.d/cloudflared.list

# 4. Update and install cloudflared
sudo apt-get update && sudo apt-get install cloudflared
```

### 2\. Configure Cloudflare Tunnel (Optional/Persistent)

If you want to use a persistent tunnel or link your machine to your Cloudflare Dashboard:

1.  Log in to [Cloudflare One](https://dash.cloudflare.com/).
2.  Go to **Networks** \> **Connectors** \> **Cloudflare Tunnels**.
3.  Select **Create a tunnel**.
4.  Choose **Cloudflared** for the connector type and select **Next**.
5.  Enter a name for your tunnel (e.g., `meeting-lab-01`) and select **Save tunnel**.
6.  Under "Choose an environment", select your operating system (Debian/Ubuntu/Kali).
7.  Copy the command token provided in the box (it starts with `sudo cloudflared service install ...`).
8.  Paste it into your terminal:

<!-- end list -->

```bash
# Example command (Replace with YOUR specific token from the dashboard)
sudo cloudflared service install eyssIjoiOTE5YWQ1Y2NhMjMxNdf5Y2Y1MTZjODc1NTE1MTZmNDMerCJ0IjoiaskwNGQzYjgtNTc5OC00ZTQ1LTliODgtZjddZDJmNjE3MDQ1IiwicyI6IllUZzBOV1EzWmpRdE1UQmlOQzAwT0RJNUxUazNOalV0T1dRNVpUvvNPVEptTm1JeSJ9
```

> **Note:** The `metting.sh` script is designed to run a Quick Tunnel (`trycloudflare.com`) automatically. If you install the service as above, ensure it doesn't conflict with port 3333, or simply let the script manage the process.

-----

## 📖 Usage Guide

### 1\. Grant Permissions

Ensure the main script has execution permissions:

```bash
chmod +x metting.sh
```

### 2\. Run the Tool

Execute the script from the terminal:

```bash
./metting.sh
```

### 3\. Select Tunnel Option

The tool will ask for a Port Forwarding option.

  * **Select Option `01`** (Cloudflare) for the best results and stability.

### 4\. Send the Link

  * Wait for the tool to generate a link (e.g., `https://random-name.trycloudflare.com`).
  * Send this link to the test device.

-----

## 📝 Troubleshooting

  * **Images not saving:**
      * Ensure the directory has write permissions: `chmod -R 777 .`
      * Check `post.php` logic if you modified it.
  * **Cloudflare Link not appearing:**
      * Check your internet connection.
      * Run `killall cloudflared` to clear any stuck background processes before restarting the tool.

-----

**Credits:**

  * Original logic based on WishFish.

<!-- end list -->
